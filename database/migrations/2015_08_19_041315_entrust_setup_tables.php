<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class EntrustSetupTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        // Create table for storing roles
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        // Create table for associating roles to users (Many-to-Many)
        Schema::create('role_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['user_id', 'role_id']);
        });

        // Create table for storing permissions
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        // Create table for associating permissions to roles (Many-to-Many)
        Schema::create('permission_role', function (Blueprint $table) {
            $table->integer('permission_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('permission_id')->references('id')->on('permissions')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['permission_id', 'role_id']);
        });

        $this->permissionSeeding();
    }

    /**
     * Buat bikin semua permission, sesuai yang ada di routes.php.
     *
     * The Permission model has the same three attributes as the Role:
     *   1. name — Unique name for the permission, used for looking up 
     *      permission information in the application layer. For 
     *      example: "create-post", "edit-user", "mailing-list-subscribe".
     *   2. display_name — Human readable name for the permission. Not
     *      necessarily unique and optional. For example "Create Posts",
     *      "Edit Users", "Post Payments", "Subscribe to mailing list".
     *   3. description — A more detailed explanation of the Permission.
     *
     * @return  void
     */
    public function permissionSeeding() {
        $permissions = [            
            ['name' => 'Akun-create', 'display_name' => 'Akun Create'],
            ['name' => 'Akun-destroy', 'display_name' => 'Akun Destroy'],
            ['name' => 'Akun-edit', 'display_name' => 'Akun Edit'],
            ['name' => 'Akun-export', 'display_name' => 'Akun Export'],
            ['name' => 'Akun-import', 'display_name' => 'Akun Import'],
            ['name' => 'Akun-index', 'display_name' => 'Akun Index'],
            ['name' => 'Akun-show', 'display_name' => 'Akun Show'],
            ['name' => 'Akun-store', 'display_name' => 'Akun Store'],
            ['name' => 'Akun-template', 'display_name' => 'Akun Template'],
            ['name' => 'Akun-update', 'display_name' => 'Akun Update'],
            ['name' => 'Akun-upload', 'display_name' => 'Akun Upload'],
            ['name' => 'Barang-create', 'display_name' => 'Barang Create'],
            ['name' => 'Barang-destroy', 'display_name' => 'Barang Destroy'],
            ['name' => 'Barang-edit', 'display_name' => 'Barang Edit'],
            ['name' => 'Barang-export', 'display_name' => 'Barang Export'],
            ['name' => 'Barang-import', 'display_name' => 'Barang Import'],
            ['name' => 'Barang-index', 'display_name' => 'Barang Index'],
            ['name' => 'Barang-show', 'display_name' => 'Barang Show'],
            ['name' => 'Barang-store', 'display_name' => 'Barang Store'],
            ['name' => 'Barang-template', 'display_name' => 'Barang Template'],
            ['name' => 'Barang-update', 'display_name' => 'Barang Update'],
            ['name' => 'Barang-upload', 'display_name' => 'Barang Upload'],
            ['name' => 'Batch-create', 'display_name' => 'Batch Create'],
            ['name' => 'Batch-destroy', 'display_name' => 'Batch Destroy'],
            ['name' => 'Batch-edit', 'display_name' => 'Batch Edit'],
            ['name' => 'Batch-index', 'display_name' => 'Batch Index'],
            ['name' => 'Batch-show', 'display_name' => 'Batch Show'],
            ['name' => 'Batch-store', 'display_name' => 'Batch Store'],
            ['name' => 'Batch-update', 'display_name' => 'Batch Update'],
            ['name' => 'Currency-daily', 'display_name' => 'Currency Daily'],
            ['name' => 'Currency-index', 'display_name' => 'Currency Index'],
            ['name' => 'Currency-kurs', 'display_name' => 'Currency Kurs'],
            ['name' => 'Currency-show', 'display_name' => 'Currency Show'],
            ['name' => 'Currency-store', 'display_name' => 'Currency Store'],
            ['name' => 'Customer-create', 'display_name' => 'Customer Create'],
            ['name' => 'Customer-destroy', 'display_name' => 'Customer Destroy'],
            ['name' => 'Customer-edit', 'display_name' => 'Customer Edit'],
            ['name' => 'Customer-index', 'display_name' => 'Customer Index'],
            ['name' => 'Customer-show', 'display_name' => 'Customer Show'],
            ['name' => 'Customer-store', 'display_name' => 'Customer Store'],
            ['name' => 'Customer-update', 'display_name' => 'Customer Update'],
            ['name' => 'DaftarPajak-create', 'display_name' => 'DaftarPajak Create'],
            ['name' => 'DaftarPajak-index', 'display_name' => 'DaftarPajak Index'],
            ['name' => 'DaftarPajak-store', 'display_name' => 'DaftarPajak Store'],
            ['name' => 'Departemen-create', 'display_name' => 'Departemen Create'],
            ['name' => 'Departemen-destroy', 'display_name' => 'Departemen Destroy'],
            ['name' => 'Departemen-edit', 'display_name' => 'Departemen Edit'],
            ['name' => 'Departemen-index', 'display_name' => 'Departemen Index'],
            ['name' => 'Departemen-show', 'display_name' => 'Departemen Show'],
            ['name' => 'Departemen-store', 'display_name' => 'Departemen Store'],
            ['name' => 'Departemen-update', 'display_name' => 'Departemen Update'],
            ['name' => 'Do-create', 'display_name' => 'Do Create'],
            ['name' => 'Do-destroy', 'display_name' => 'Do Destroy'],
            ['name' => 'Do-edit', 'display_name' => 'Do Edit'],
            ['name' => 'Do-index', 'display_name' => 'Do Index'],
            ['name' => 'Do-show', 'display_name' => 'Do Show'],
            ['name' => 'Do-store', 'display_name' => 'Do Store'],
            ['name' => 'Do-update', 'display_name' => 'Do Update'],
            ['name' => 'Gudang-create', 'display_name' => 'Gudang Create'],
            ['name' => 'Gudang-destroy', 'display_name' => 'Gudang Destroy'],
            ['name' => 'Gudang-edit', 'display_name' => 'Gudang Edit'],
            ['name' => 'Gudang-index', 'display_name' => 'Gudang Index'],
            ['name' => 'Gudang-show', 'display_name' => 'Gudang Show'],
            ['name' => 'Gudang-store', 'display_name' => 'Gudang Store'],
            ['name' => 'Gudang-update', 'display_name' => 'Gudang Update'],
            ['name' => 'Ia-create', 'display_name' => 'Ia Create'],
            ['name' => 'Ia-destroy', 'display_name' => 'Ia Destroy'],
            ['name' => 'Ia-edit', 'display_name' => 'Ia Edit'],
            ['name' => 'Ia-index', 'display_name' => 'Ia Index'],
            ['name' => 'Ia-show', 'display_name' => 'Ia Show'],
            ['name' => 'Ia-store', 'display_name' => 'Ia Store'],
            ['name' => 'Ia-update', 'display_name' => 'Ia Update'],
            ['name' => 'Jabatan-create', 'display_name' => 'Jabatan Create'],
            ['name' => 'Jabatan-destroy', 'display_name' => 'Jabatan Destroy'],
            ['name' => 'Jabatan-edit', 'display_name' => 'Jabatan Edit'],
            ['name' => 'Jabatan-index', 'display_name' => 'Jabatan Index'],
            ['name' => 'Jabatan-show', 'display_name' => 'Jabatan Show'],
            ['name' => 'Jabatan-store', 'display_name' => 'Jabatan Store'],
            ['name' => 'Jabatan-update', 'display_name' => 'Jabatan Update'],
            ['name' => 'Karyawan-create', 'display_name' => 'Karyawan Create'],
            ['name' => 'Karyawan-destroy', 'display_name' => 'Karyawan Destroy'],
            ['name' => 'Karyawan-edit', 'display_name' => 'Karyawan Edit'],
            ['name' => 'Karyawan-index', 'display_name' => 'Karyawan Index'],
            ['name' => 'Karyawan-show', 'display_name' => 'Karyawan Show'],
            ['name' => 'Karyawan-store', 'display_name' => 'Karyawan Store'],
            ['name' => 'Karyawan-update', 'display_name' => 'Karyawan Update'],
            ['name' => 'Pajak-create', 'display_name' => 'Pajak Create'],
            ['name' => 'Pajak-destroy', 'display_name' => 'Pajak Destroy'],
            ['name' => 'Pajak-edit', 'display_name' => 'Pajak Edit'],
            ['name' => 'Pajak-index', 'display_name' => 'Pajak Index'],
            ['name' => 'Pajak-show', 'display_name' => 'Pajak Show'],
            ['name' => 'Pajak-store', 'display_name' => 'Pajak Store'],
            ['name' => 'Pajak-update', 'display_name' => 'Pajak Update'],
            ['name' => 'Perusahaan-create', 'display_name' => 'Perusahaan Create'],
            ['name' => 'Perusahaan-index', 'display_name' => 'Perusahaan Index'],
            ['name' => 'Perusahaan-store', 'display_name' => 'Perusahaan Store'],
            ['name' => 'Proyek-create', 'display_name' => 'Proyek Create'],
            ['name' => 'Proyek-destroy', 'display_name' => 'Proyek Destroy'],
            ['name' => 'Proyek-edit', 'display_name' => 'Proyek Edit'],
            ['name' => 'Proyek-index', 'display_name' => 'Proyek Index'],
            ['name' => 'Proyek-show', 'display_name' => 'Proyek Show'],
            ['name' => 'Proyek-store', 'display_name' => 'Proyek Store'],
            ['name' => 'Proyek-update', 'display_name' => 'Proyek Update'],
            ['name' => 'PurchaseInvoice-create', 'display_name' => 'PurchaseInvoice Create'],
            ['name' => 'PurchaseInvoice-destroy', 'display_name' => 'PurchaseInvoice Destroy'],
            ['name' => 'PurchaseInvoice-edit', 'display_name' => 'PurchaseInvoice Edit'],
            ['name' => 'PurchaseInvoice-index', 'display_name' => 'PurchaseInvoice Index'],
            ['name' => 'PurchaseInvoice-show', 'display_name' => 'PurchaseInvoice Show'],
            ['name' => 'PurchaseInvoice-store', 'display_name' => 'PurchaseInvoice Store'],
            ['name' => 'PurchaseInvoice-update', 'display_name' => 'PurchaseInvoice Update'],
            ['name' => 'PurchaseOrder-alamatjson', 'display_name' => 'PurchaseOrder Alamatjson'],
            ['name' => 'PurchaseOrder-create', 'display_name' => 'PurchaseOrder Create'],
            ['name' => 'PurchaseOrder-destroy', 'display_name' => 'PurchaseOrder Destroy'],
            ['name' => 'PurchaseOrder-edit', 'display_name' => 'PurchaseOrder Edit'],
            ['name' => 'PurchaseOrder-index', 'display_name' => 'PurchaseOrder Index'],
            ['name' => 'PurchaseOrder-prjson', 'display_name' => 'PurchaseOrder Prjson'],
            ['name' => 'PurchaseOrder-show', 'display_name' => 'PurchaseOrder Show'],
            ['name' => 'PurchaseOrder-store', 'display_name' => 'PurchaseOrder Store'],
            ['name' => 'PurchaseOrder-update', 'display_name' => 'PurchaseOrder Update'],
            ['name' => 'PurchaseRequisition-create', 'display_name' => 'PurchaseRequisition Create'],
            ['name' => 'PurchaseRequisition-destroy', 'display_name' => 'PurchaseRequisition Destroy'],
            ['name' => 'PurchaseRequisition-edit', 'display_name' => 'PurchaseRequisition Edit'],
            ['name' => 'PurchaseRequisition-index', 'display_name' => 'PurchaseRequisition Index'],
            ['name' => 'PurchaseRequisition-show', 'display_name' => 'PurchaseRequisition Show'],
            ['name' => 'PurchaseRequisition-store', 'display_name' => 'PurchaseRequisition Store'],
            ['name' => 'PurchaseRequisition-update', 'display_name' => 'PurchaseRequisition Update'],
            ['name' => 'PurchaseReturn-alamatjson', 'display_name' => 'PurchaseReturn Alamatjson'],
            ['name' => 'PurchaseReturn-create', 'display_name' => 'PurchaseReturn Create'],
            ['name' => 'PurchaseReturn-destroy', 'display_name' => 'PurchaseReturn Destroy'],
            ['name' => 'PurchaseReturn-edit', 'display_name' => 'PurchaseReturn Edit'],
            ['name' => 'PurchaseReturn-index', 'display_name' => 'PurchaseReturn Index'],
            ['name' => 'PurchaseReturn-prjson', 'display_name' => 'PurchaseReturn Prjson'],
            ['name' => 'PurchaseReturn-show', 'display_name' => 'PurchaseReturn Show'],
            ['name' => 'PurchaseReturn-store', 'display_name' => 'PurchaseReturn Store'],
            ['name' => 'PurchaseReturn-update', 'display_name' => 'PurchaseReturn Update'],
            ['name' => 'ReceiveOrder-alamatjson', 'display_name' => 'ReceiveOrder Alamatjson'],
            ['name' => 'ReceiveOrder-create', 'display_name' => 'ReceiveOrder Create'],
            ['name' => 'ReceiveOrder-destroy', 'display_name' => 'ReceiveOrder Destroy'],
            ['name' => 'ReceiveOrder-edit', 'display_name' => 'ReceiveOrder Edit'],
            ['name' => 'ReceiveOrder-index', 'display_name' => 'ReceiveOrder Index'],
            ['name' => 'ReceiveOrder-prjson', 'display_name' => 'ReceiveOrder Prjson'],
            ['name' => 'ReceiveOrder-show', 'display_name' => 'ReceiveOrder Show'],
            ['name' => 'ReceiveOrder-store', 'display_name' => 'ReceiveOrder Store'],
            ['name' => 'ReceiveOrder-update', 'display_name' => 'ReceiveOrder Update'],
            ['name' => 'Saldo-create', 'display_name' => 'Saldo Create'],
            ['name' => 'Saldo-destroy', 'display_name' => 'Saldo Destroy'],
            ['name' => 'Saldo-edit', 'display_name' => 'Saldo Edit'],
            ['name' => 'Saldo-index', 'display_name' => 'Saldo Index'],
            ['name' => 'Saldo-show', 'display_name' => 'Saldo Show'],
            ['name' => 'Saldo-store', 'display_name' => 'Saldo Store'],
            ['name' => 'Saldo-update', 'display_name' => 'Saldo Update'],
            ['name' => 'Sales-create', 'display_name' => 'Sales Create'],
            ['name' => 'Sales-destroy', 'display_name' => 'Sales Destroy'],
            ['name' => 'Sales-edit', 'display_name' => 'Sales Edit'],
            ['name' => 'Sales-index', 'display_name' => 'Sales Index'],
            ['name' => 'Sales-show', 'display_name' => 'Sales Show'],
            ['name' => 'Sales-store', 'display_name' => 'Sales Store'],
            ['name' => 'Sales-update', 'display_name' => 'Sales Update'],
            ['name' => 'Supplier-create', 'display_name' => 'Supplier Create'],
            ['name' => 'Supplier-destroy', 'display_name' => 'Supplier Destroy'],
            ['name' => 'Supplier-edit', 'display_name' => 'Supplier Edit'],
            ['name' => 'Supplier-index', 'display_name' => 'Supplier Index'],
            ['name' => 'Supplier-show', 'display_name' => 'Supplier Show'],
            ['name' => 'Supplier-store', 'display_name' => 'Supplier Store'],
            ['name' => 'Supplier-update', 'display_name' => 'Supplier Update'],
            ['name' => 'SyaratPembayaran-create', 'display_name' => 'SyaratPembayaran Create'],
            ['name' => 'SyaratPembayaran-destroy', 'display_name' => 'SyaratPembayaran Destroy'],
            ['name' => 'SyaratPembayaran-edit', 'display_name' => 'SyaratPembayaran Edit'],
            ['name' => 'SyaratPembayaran-index', 'display_name' => 'SyaratPembayaran Index'],
            ['name' => 'SyaratPembayaran-show', 'display_name' => 'SyaratPembayaran Show'],
            ['name' => 'SyaratPembayaran-store', 'display_name' => 'SyaratPembayaran Store'],
            ['name' => 'SyaratPembayaran-update', 'display_name' => 'SyaratPembayaran Update'],
            ['name' => 'TipeAkun-create', 'display_name' => 'TipeAkun Create'],
            ['name' => 'TipeAkun-destroy', 'display_name' => 'TipeAkun Destroy'],
            ['name' => 'TipeAkun-edit', 'display_name' => 'TipeAkun Edit'],
            ['name' => 'TipeAkun-export', 'display_name' => 'TipeAkun Export'],
            ['name' => 'TipeAkun-import', 'display_name' => 'TipeAkun Import'],
            ['name' => 'TipeAkun-index', 'display_name' => 'TipeAkun Index'],
            ['name' => 'TipeAkun-show', 'display_name' => 'TipeAkun Show'],
            ['name' => 'TipeAkun-store', 'display_name' => 'TipeAkun Store'],
            ['name' => 'TipeAkun-template', 'display_name' => 'TipeAkun Template'],
            ['name' => 'TipeAkun-upload', 'display_name' => 'TipeAkun Upload'],
        ];

        DB::table('permissions')->insert($permissions);
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('permission_role');
        Schema::drop('permissions');
        Schema::drop('role_user');
        Schema::drop('roles');
    }
}
