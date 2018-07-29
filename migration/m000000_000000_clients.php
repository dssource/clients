<?php

use yii\db\Migration;
class m000000_000000_clients extends Migration
{
    public $tableName = 'ds_clients';
    public $tableNameRate = 'ds_clients_rate';
    public $tableNameHistory = 'ds_clients_balance_history';
    public $tableNameServices = 'ds_clients_services';
    public $tableNameProject = 'ds_clients_project';

    public function up()
    {
        // Клиенты
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'id_account' => $this->integer(),
            'name' => $this->text(),
            'surname' => $this->text(),
            'last_name' => $this->text(),
            'phone' => $this->text(),
            'mobile_phone' => $this->text(),
            'skype' => $this->text(),
            'email' => $this->text(),
            'photo' => $this->text(),
            'website' => $this->text(),
            'balance' => $this->float(),
            'rate' => $this->float(),
            'comment' => $this->text(),
            'create_at' => $this->integer(),
            'is_active' => $this->boolean()->defaultValue(false)
        ]);
        // Тарфиы
        $this->createTable($this->tableNameRate, [
            'id' => $this->primaryKey(),
            'name' => $this->text(),
            'discount_factor' => $this->float(),
            'comment' => $this->text(),
            'create_at' => $this->integer(),
            'is_active' => $this->boolean()->defaultValue(true)
        ]);
        // История зачисления
        $this->createTable($this->tableNameHistory, [
            'id' => $this->primaryKey(),
            'id_client' => $this->integer(),
            'sum' => $this->float(),
            'report' => $this->boolean()->defaultValue(false), // Учетный - да/нет
            'comment' => $this->text(),
            'create_at' => $this->integer(),
            'is_active' => $this->boolean()->defaultValue(true)
        ]);

        // Услуги
        /*
         * Поддержка услуг следующих типов (type):
         *  single - разовая (списание разово), стоимость фиксированная
         *  periodic - переодическая (списание раз в заданный период time_of_action)
         * */
        $this->createTable($this->tableNameServices, [
            'id' => $this->primaryKey(),
            'name' => $this->text(), // Название услуги
            'type' => $this->text(), // Тип услуги
            'time_of_action' => $this->integer(), // Время действия (если услуга типа periodic), в секундах.
            'order_minimal' => $this->float(), // Минимальное кол-во доступное в заказе
            'description' => $this->text(), // Описание услуги
            'comment' => $this->text(), // Коментарий (виден администратору)
            'price' => $this->float(), // Стоимость услуги
            'unit' => $this->text(), // Ед. из. услуги (текст)
            'create_at' => $this->integer(), // время создания
            'is_active' => $this->boolean()->defaultValue(false) // Активная ли услуга. НЕТ по-умолчанию
        ]);

# ----------------------------- Данные ------------------------------------------- #
        // Новый тариф
        $this->insert($this->tableNameRate, [
            'id' => 1,
            'name' => 'default rate',
            'discount_factor' => 1,
            'comment' => 'default rate',
            'create_at' => time(),
            'is_active' => true
        ]);

        // Новый клиент
        $this->insert($this->tableName,[
            'id' => 1,
            'id_account' => 1,
            'name' => 'Joe',
            'surname' => 'Doe',
            'last_name' => 'Smith',
            'phone' => '8 8000 8080',
            'mobile_phone' => '8 8000 8080',
            'skype' => 'alex_vyksa',
            'email' => 'support@digital-solution.ru',
            'photo' => '',
            'website' => 'https://digital-solution.ru',
            'balance' => 999999,
            'rate' => 1,
            'comment' => 'default client',
            'create_at' => time(),
            'is_active' => true
        ]);

        // Новое зачисление
        $this->insert($this->tableNameHistory, [
            'id' => 1,
            'id_client' => 1,
            'sum' => 999999,
            'report' => false,
            'comment' => 'Test payment (no report)',
            'create_at' => time(),
            'is_active' => true
        ]);

        // Новая услуга
        $this->insert($this->tableNameServices, [
            'id' => 1,
            'name' => 'default service', // Название услуги
            'type' => 'single', // Тип услуги
            'time_of_action' => 0, // Время действия (если услуга типа periodic), в секундах.
            'order_minimal' => 1, // Минимальное кол-во доступное в заказе
            'description' => 'default service (description)', // Описание услуги
            'comment' => 'default service (comment)', // Коментарий (виден администратору)
            'price' => 300, // Стоимость услуги
            'unit' => 'Час', // Ед. из. услуги (текст)
            'create_at' => time(), // время создания
            'is_active' => true // Активная ли услуга. НЕТ по-умолчанию
        ]);


    }
    public function down()
    {
        // Очистка и удаление

        //Клиенты
        $this->truncateTable($this->tableName);
        $this->dropTable($this->tableName);

        // Тарифы
        $this->truncateTable($this->tableNameRate);
        $this->dropTable($this->tableNameRate);

        // История баланса
        $this->truncateTable($this->tableNameHistory);
        $this->dropTable($this->tableNameHistory);

        // Услуги
        $this->truncateTable($this->tableNameServices);
        $this->dropTable($this->tableNameServices);
    }
}