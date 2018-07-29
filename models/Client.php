<?php

namespace dssource\clients\models;

use Yii;
use yii\db\ActiveRecord;

class Client extends ActiveRecord
{
    public $defaultImage = 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA0OCA0OCI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSIwIiB4MT0iMTMuNTk0IiB5MT0iMzcuMDkiIHgyPSIxMi42ODkiIHkyPSItMTIuNjY1IiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHN0b3Agc3RvcC1jb2xvcj0iIzU2NjA2OSIvPjxzdG9wIG9mZnNldD0iMSIgc3RvcC1jb2xvcj0iIzZjNzg4NCIvPjwvbGluZWFyR3JhZGllbnQ+PC9kZWZzPjxwYXRoIGQ9Im0xNi40MjggMTUuNzQ0Yy0uMTU5LS4wNTItMS4xNjQtLjUwNS0uNTM2LTIuNDE0aC0uMDA5YzEuNjM3LTEuNjg2IDIuODg4LTQuMzk5IDIuODg4LTcuMDcgMC00LjEwNy0yLjczMS02LjI2LTUuOTA1LTYuMjYtMy4xNzYgMC01Ljg5MiAyLjE1Mi01Ljg5MiA2LjI2IDAgMi42ODIgMS4yNDQgNS40MDYgMi44OTEgNy4wODguNjQyIDEuNjg0LS41MDYgMi4zMDktLjc0NiAyLjM5Ni0yLjIzOC43MjQtOC4zMjUgNC4zMzItOC4yMjkgOS41ODZoMjQuMDVjLjEwNy01LjAyLTQuNzA4LTguMjc5LTguNTEzLTkuNTg2bTIxLjgxNzMwNS0zLjA3OTE5NmEyNS4zMjk3MTggMjUuMzI5NzE4IDAgMCAxIC0yNS4zMjk3MTggMjUuMzI5NzE4IDI1LjMyOTcxOCAyNS4zMjk3MTggMCAwIDEgLTI1LjMyOTcxOCAtMjUuMzI5NzE4IDI1LjMyOTcxOCAyNS4zMjk3MTggMCAwIDEgMjUuMzI5NzE4IC0yNS4zMjk3MTggMjUuMzI5NzE4IDI1LjMyOTcxOCAwIDAgMSAyNS4zMjk3MTggMjUuMzI5NzE4IiBmaWxsPSJ1cmwoIzApIiB0cmFuc2Zvcm09Im1hdHJpeCguOTQ3NDkgMCAwIC45NDc0OSAxMS43NTkgMTIuMDEpIi8+PC9zdmc+';

    public static function tableName()
    {
        return 'ds_clients';
    }

    public function attributeLabels()
    {
        return [
            'id' =>         'ID',
            'id_account' => 'ID Связанного аккаунта',
            'name' =>       'Имя',
            'surname' =>    'Фамилия',
            'last_name' =>  'Отчество',
            'phone' =>      'Телефон',
            'mobile_phone' => 'Моб. телефон',
            'email' => 'Эл. почта',
            'photo' =>      'Путь к фотографии',
            'website' =>    'WEB-Site',
            'balance' =>    'Баланс',
            'rate' =>       'Тариф',
            'comment' =>    'Комментарий к контакту',
            'create_at' =>  'Создан',
            'is_active' =>  'Статус записи',
        ];
    }
}
