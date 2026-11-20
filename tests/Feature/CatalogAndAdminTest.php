<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CatalogAndAdminTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_catalog_filters_by_category_and_displays_product_slug(): void
    {
        $sumatra = Category::create(['name' => 'Kopi Sumatra', 'slug' => 'kopi-sumatra']);
        $java = Category::create(['name' => 'Kopi Jawa', 'slug' => 'kopi-jawa']);
        Product::create([
            'category_id' => $sumatra->id,
            'name' => 'Gayo Aceh',
            'slug' => 'gayo-aceh',
            'description' => 'Aroma rempah, body penuh, acidity seimbang.',
            'price' => 125000,
            'is_active' => true,
        ]);
        Product::create([
            'category_id' => $java->id,
            'name' => 'Java Preanger',
            'slug' => 'java-preanger',
            'description' => 'Aroma floral, body medium, acidity segar.',
            'price' => 138000,
            'is_active' => true,
        ]);

        $this->get(route('products.index', ['kategori' => 'kopi-sumatra']))
            ->assertOk()
            ->assertSee('Gayo Aceh')
            ->assertDontSee('Java Preanger');

        $this->get(route('products.show', 'gayo-aceh'))
            ->assertOk()
            ->assertSee('Kopi Sumatra')
            ->assertSee('125.000');
    }

    public function test_admin_routes_require_an_admin_account(): void
    {
        $this->get(route('admin.dashboard'))->assertRedirect(route('login'));
        $this->get(route('home'))->assertSee('Masuk')->assertSee('Daftar');

        $user = User::create([
            'name' => 'Pengunjung',
            'email' => 'user@example.test',
            'password' => 'password',
            'is_admin' => false,
        ]);

        $this->actingAs($user)->get(route('admin.dashboard'))->assertForbidden();
    }

    public function test_customers_can_register_login_and_logout_without_admin_privileges(): void
    {
        $this->get(route('login'))->assertOk()->assertSee('Masuk');
        $this->get(route('register'))->assertOk()->assertSee('Daftar Sekarang');
        $this->get(route('admin.dashboard'))->assertRedirect(route('login'));

        $this->post(route('register.store'), [
            'name' => 'Pelanggan Kopi',
            'email' => 'pelanggan@example.test',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ])->assertRedirect(route('home'));

        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', [
            'email' => 'pelanggan@example.test',
            'is_admin' => false,
        ]);
        $this->get(route('home'))->assertSee('Pelanggan Kopi');
        $this->get(route('admin.dashboard'))->assertForbidden();

        $this->post(route('logout'))->assertRedirect(route('home'));
        $this->assertGuest();

        $this->post(route('login.store'), [
            'email' => 'pelanggan@example.test',
            'password' => 'password123',
        ])->assertRedirect(route('home'));
        $this->assertAuthenticated();
    }

    public function test_admin_dashboard_shows_store_statistics_and_product_actions(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'dashboard@example.test',
            'password' => 'password',
            'is_admin' => true,
        ]);
        User::create([
            'name' => 'Pelanggan',
            'email' => 'customer@example.test',
            'password' => 'password',
            'is_admin' => false,
        ]);
        $category = Category::create(['name' => 'Kopi Sumatra', 'slug' => 'kopi-sumatra']);
        Product::create([
            'category_id' => $category->id,
            'name' => 'Gayo Aceh',
            'slug' => 'gayo-aceh',
            'description' => 'Aroma rempah, body penuh, acidity seimbang.',
            'price' => 125000,
            'is_active' => true,
        ]);

        $this->actingAs($admin)
            ->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee('Total Produk Kopi')
            ->assertSee('Total Wilayah')
            ->assertSee('Pesanan Bulan Ini')
            ->assertSee('Pelanggan Terdaftar')
            ->assertSee('Gayo Aceh')
            ->assertSee('250 g')
            ->assertSee('Tambah Produk')
            ->assertSee('Edit')
            ->assertSee('Hapus');
    }

    public function test_seeder_creates_the_admin_account_and_catalog(): void
    {
        Storage::fake('public');
        $this->seed();

        $this->assertDatabaseCount('users', 1);
        $this->assertDatabaseCount('categories', 4);
        $this->assertDatabaseCount('products', 6);

        $this->post(route('admin.login.store'), [
            'email' => 'admin@umkm.test',
            'password' => 'password',
        ])->assertRedirect(route('admin.dashboard'));

        $this->get(route('admin.dashboard'))->assertOk();
        $this->get(route('home'))->assertSee('Dashboard Admin')->assertSee('Logout');
    }

    public function test_admin_can_manage_categories_and_products_and_product_deletion_removes_its_image(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.test',
            'password' => 'password',
            'is_admin' => true,
        ]);
        $this->actingAs($admin);

        $this->get(route('admin.dashboard'))->assertOk();
        $this->get(route('admin.products.index'))->assertOk();
        $this->get(route('admin.products.create'))->assertOk();
        $this->get(route('admin.categories.index'))->assertOk();
        $this->get(route('admin.categories.create'))->assertOk();

        $this->post(route('admin.categories.store'), [
            'name' => 'Kopi Sumatra',
            'description' => 'Kopi dari tanah Sumatra.',
        ])->assertRedirect(route('admin.categories.index'));
        $this->assertDatabaseHas('categories', ['slug' => 'kopi-sumatra']);

        $category = Category::firstOrFail();
        $this->put(route('admin.categories.update', $category), [
            'name' => 'Kopi Sumatera',
            'description' => 'Kopi dari tanah Sumatra.',
        ])->assertRedirect(route('admin.categories.index'));
        $this->assertDatabaseHas('categories', ['slug' => 'kopi-sumatera']);

        $category = Category::firstOrFail();
        $this->get(route('admin.categories.edit', $category))->assertOk();
        $this->post(route('admin.products.store'), [
            'name' => 'Gayo Aceh',
            'category_id' => $category->id,
            'description' => 'Aroma rempah, body penuh, acidity seimbang.',
            'price' => 125000,
            'is_active' => 1,
        ])->assertRedirect(route('admin.products.index'));
        $this->assertDatabaseHas('products', ['slug' => 'gayo-aceh']);

        $product = Product::firstOrFail();
        $this->get(route('admin.products.edit', $product))->assertOk();
        $this->put(route('admin.products.update', $product), [
            'name' => 'Gayo Premium',
            'category_id' => $category->id,
            'description' => 'Aroma rempah, body penuh, acidity seimbang.',
            'price' => 130000,
            'is_active' => 1,
        ])->assertRedirect(route('admin.products.index'));
        $product->refresh();
        $this->assertSame('gayo-premium', $product->slug);

        $category = Category::firstOrFail();
        Storage::fake('public');
        Storage::disk('public')->put('products/gayo.svg', '<svg/>');
        $product->update(['image' => 'products/gayo.svg']);

        $this->delete(route('admin.products.destroy', $product))
            ->assertRedirect(route('admin.products.index'));
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
        Storage::disk('public')->assertMissing('products/gayo.svg');
    }

    public function test_uploaded_product_images_are_saved_and_replaced(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'images@example.test',
            'password' => 'password',
            'is_admin' => true,
        ]);
        $category = Category::create(['name' => 'Kopi Sumatra', 'slug' => 'kopi-sumatra']);
        Storage::fake('public');
        $this->actingAs($admin);

        $png = base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAwMCAO+/U3sAAAAASUVORK5CYII=', true);
        $this->post(route('admin.products.store'), [
            'name' => 'Gayo Aceh',
            'category_id' => $category->id,
            'description' => 'Aroma rempah, body penuh, acidity seimbang.',
            'price' => 125000,
            'is_active' => 1,
            'image' => UploadedFile::fake()->createWithContent('gayo.png', $png),
        ])->assertRedirect(route('admin.products.index'));

        $product = Product::firstOrFail();
        $oldImage = $product->image;
        Storage::disk('public')->assertExists($oldImage);

        $this->put(route('admin.products.update', $product), [
            'name' => $product->name,
            'category_id' => $category->id,
            'description' => $product->description,
            'price' => $product->price,
            'is_active' => 1,
            'image' => UploadedFile::fake()->createWithContent('gayo-baru.png', $png),
        ])->assertRedirect(route('admin.products.index'));

        $newImage = $product->refresh()->image;
        $this->assertNotSame($oldImage, $newImage);
        Storage::disk('public')->assertMissing($oldImage);
        Storage::disk('public')->assertExists($newImage);
    }
}
