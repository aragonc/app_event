<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create(
            [
                'variable' => 'app_title',
                'value' => 'Sistema de Landing Pages',
                'display_text' => 'Nombre del sistema'
            ]);
        App\Setting::create(
            [
                'variable' => 'app_description',
                'value' => 'Gestión de eventos y registro de usuarios',
                'display_text' => 'Descripción del sistema'
            ]
        );
        App\Setting::create(
            [
                'variable' => 'app_email',
                'value' => 'aragcar@gmail.com',
                'display_text' => 'Email del administrador'
            ]
        );
        App\Setting::create(
            [
                'variable' => 'app_url',
                'value' => 'http://event.tunqui.pe',
                'display_text' => 'URL de la organización'
            ]
        );
        App\Setting::create(
            [
                'variable' => 'app_logo',
                'value' => null,
                'display_text' => 'Logotipo'
            ]
        );
        App\Setting::create(
            [
                'variable' => 'app_phone',
                'value' => '954189939',
                'display_text' => 'Télefono del administrador'
            ]
        );
    }
}
