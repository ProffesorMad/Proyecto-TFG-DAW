<?php

namespace App\Http\Controllers;

use App\Models\Champion;

class RoleController extends Controller
{
    public function index()
    {
        $roles =
            [
                [
                    'name' => 'Tanque',

                    'description' =>
                        'Los tanques son campeones resistentes especializados en absorber grandes cantidades de daño y proteger a sus aliados durante las peleas. Destacan por iniciar combates y controlar enemigos.',

                    'image' => 'https://media.vandal.net/m/8-2021/20218301318158_6.jpg'
                ],

                [
                    'name' => 'Luchador',

                    'description' =>
                        'Los luchadores combinan daño y resistencia equilibrados. Son campeones muy efectivos en combate cuerpo a cuerpo y capaces de mantenerse vivos mientras infligen daño constante.',

                    'image' => 'https://media.vandal.net/m/8-2021/20218301318158_2.jpg'
                ],

                [
                    'name' => 'Mago',

                    'description' =>
                        'Los magos utilizan habilidades mágicas de gran impacto para eliminar enemigos desde la distancia. Suelen destacar por el burst damage y el control de masas.',

                    'image' => 'https://media.vandal.net/m/8-2021/20218301318158_3.jpg'
                ],

                [
                    'name' => 'Tirador',

                    'description' =>
                        'Los tiradores son especialistas en daño físico sostenido desde larga distancia. Escalan muy bien al final de la partida y dependen mucho de posicionarse correctamente.',

                    'image' => 'https://media.vandal.net/m/8-2021/20218301318158_4.jpg'
                ],

                [
                    'name' => 'Soporte',

                    'description' =>
                        'Los soportes ayudan a su equipo mediante curaciones, escudos, visión y control de masas. Son fundamentales para proteger aliados y facilitar jugadas.',

                    'image' => 'https://media.vandal.net/m/8-2021/20218301318158_1.jpg'
                ],

                [
                    'name' => 'Asesino',

                    'description' =>
                        'Los asesinos son campeones extremadamente móviles centrados en eliminar objetivos prioritarios rápidamente. Destacan por su alto daño explosivo.',

                    'image' => 'https://media.vandal.net/m/8-2021/20218301318158_5.jpg'
                ]
            ];;

        return view('roles.index', compact('roles'));
    }

    public function show($role)
    {
        $champions = Champion::where('role', $role)->get();

        return view('roles.show', compact('role', 'champions'));
    }
}
