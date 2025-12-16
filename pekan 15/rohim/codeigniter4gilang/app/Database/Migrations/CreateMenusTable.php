public function up()
{
    $this->forge->addField([
        'id' => [
            'type'           => 'INT',
            'constraint'     => 11,
            'unsigned'       => true,
            'auto_increment' => true,
        ],
        'name' => [
            'type'       => 'VARCHAR',
            'constraint' => 120,
        ],
        'category' => [
            'type'       => 'VARCHAR',
            'constraint' => 50,
            'default'    => 'Coffee',
        ],
        'price' => [
            'type'       => 'INT',
            'constraint' => 11,
            'default'    => 0,
        ],
        'description' => [
            'type' => 'TEXT',
            'null' => true,
        ],
        'created_at' => ['type' => 'DATETIME', 'null' => true],
        'updated_at' => ['type' => 'DATETIME', 'null' => true],
    ]);

    $this->forge->addKey('id', true);
    $this->forge->createTable('menus');
}

public function down()
{
    $this->forge->dropTable('menus');
}
