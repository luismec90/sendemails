<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Fill_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    function poblarBD() {
        $this->usuario();
        $this->conductor();
        $this->ruta();
        $this->estudiante();
        $this->bitacora_estudiante();
        $this->acudiente();
        $this->estudiante_x_acudiente();
        $this->asunto();
        $this->copia_email();
        $this->historico();
    }

    private function usuario() {
        $this->db->empty_table('usuario');
        $data = array(
            'id' => 1,
            'nombres' => 'Juan Salvador',
            'apellidos' => 'Gaviota',
            'sexo' => 'masculino',
            'fecha_nacimiento' => '1980-05-12',
            'usuario' => 'user1',
            'password' => sha1("123"),
            'email' => 'luismec90@gmail.com',
            'celular' => '311 3727751',
            'rol' => 'usuario'
        );
        $this->db->insert('usuario', $data);

        $data = array(
            'id' => 2,
            'nombres' => 'Guia 1',
            'apellidos' => 'Guia',
            'sexo' => 'masculino',
            'fecha_nacimiento' => '1980-05-12',
            'usuario' => 'guia1',
            'password' => sha1("123"),
            'email' => 'luismec90@gmail.com',
            'celular' => '311 3727751',
            'rol' => 'usuario'
        );
        $this->db->insert('usuario', $data);


        $data = array(
            'id' => 3,
            'nombres' => 'Admin',
            'apellidos' => 'Admin',
            'sexo' => 'masculino',
            'fecha_nacimiento' => '1980-05-12',
            'usuario' => 'admin1',
            'password' => sha1("123"),
            'email' => 'luismec90@gmail.com',
            'celular' => '311 3727751',
            'rol' => 'admin'
        );
        $this->db->insert('usuario', $data);
    }

    private function conductor() {
        $this->db->empty_table('conductor');
        $data = array(
            'id' => 1,
            'cedula' => '123456789',
            'nombres' => 'Abdiel Salvador',
            'apellidos' => 'Arcos Alvares',
            'sexo' => 'masculino',
            'fecha_nacimiento' => '1980-05-12',
            'telefono_casa' => '2368965',
            'celular' => '3117258934',
            'email' => 'abdiel@gmail.com'
        );
        $this->db->insert('conductor', $data);

        $data = array(
            'id' => 2,
            'cedula' => '123456789',
            'nombres' => 'Diana María',
            'apellidos' => 'Jiménez Betancur',
            'sexo' => 'femenino',
            'fecha_nacimiento' => '1985-05-12',
            'telefono_casa' => '123468',
            'celular' => '3135896585',
            'email' => 'diana@gmail.com'
        );
        $this->db->insert('conductor', $data);
    }

    private function ruta() {
        $this->db->empty_table('ruta');
        $data = array(
            'id' => 1,
            'id_conductor' => 1,
            'nombre' => 'Ruta 1',
            'bus' => 'WTG 546',
            'capacidad' => '50'
        );
        $this->db->insert('ruta', $data);

        $data = array(
            'id' => 2,
            'id_conductor' => 1,
            'nombre' => 'Ruta 2',
            'bus' => 'WTG 546',
            'capacidad' => '50'
        );
        $this->db->insert('ruta', $data);

        $data = array(
            'id' => 3,
            'id_conductor' => 1,
            'nombre' => '0016',
            'bus' => 'WTG 546',
            'capacidad' => '50'
        );
        $this->db->insert('ruta', $data);
    }

    private function estudiante() {
        $this->db->empty_table('estudiante');
        $data = array(
            'id' => 1,
            'id_ruta' => 1,
            'nombres' => 'David Abraham',
            'apellidos' => 'Arguello Sanchez',
            'sexo' => 'masculino',
            'grado' => 'sexto',
            'fecha_nacimiento' => '1980-05-12',
            'curso' => 'A',
            'direccion' => 'Crr 28 # 30-08',
            'telefono_casa' => '2368965',
            'celular' => '3117258934'
        );
        $this->db->insert('estudiante', $data);

        $data = array(
            'id' => 2,
            'id_ruta' => 1,
            'nombres' => 'Jose Jorge',
            'apellidos' => 'Bueno Contreras',
            'sexo' => 'masculino',
            'grado' => 'sexto',
            'fecha_nacimiento' => '1980-05-12',
            'curso' => 'A',
            'direccion' => 'Crr 28 # 30-08',
            'telefono_casa' => '2368965',
            'celular' => '3117258934'
        );
        $this->db->insert('estudiante', $data);

        $data = array(
            'id' => 3,
            'id_ruta' => 1,
            'nombres' => 'Claudia Araceli',
            'apellidos' => 'Rodriguez Gallardo',
            'sexo' => 'femenino',
            'grado' => 'sexto',
            'fecha_nacimiento' => '1980-05-12',
            'curso' => 'A',
            'direccion' => 'Crr 28 # 30-08',
            'telefono_casa' => '2368965',
            'celular' => '3117258934'
        );
        $this->db->insert('estudiante', $data);

        $data = array(
            'id' => 4,
            'id_ruta' => 1,
            'nombres' => 'Roxana Wendoline',
            'apellidos' => 'Ruiz Aguilar',
            'sexo' => 'femenino',
            'grado' => 'sexto',
            'fecha_nacimiento' => '1980-05-12',
            'curso' => 'A',
            'direccion' => 'Crr 28 # 30-08',
            'telefono_casa' => '2368965',
            'celular' => '3117258934'
        );
        $this->db->insert('estudiante', $data);

        $data = array(
            'id' => 5,
            'id_ruta' => 2,
            'nombres' => 'Luis Fernando',
            'apellidos' => 'Montoya Gómez',
            'sexo' => 'masculino',
            'grado' => 'sexto',
            'fecha_nacimiento' => '1980-05-12',
            'curso' => 'A',
            'direccion' => 'Crr 28 # 30-08',
            'telefono_casa' => '2368965',
            'celular' => '3117258934'
        );
        $this->db->insert('estudiante', $data);

        $data = array(
            'id' => 6,
            'id_ruta' => 1,
            'nombres' => 'Juan Alejandro',
            'apellidos' => 'Ramírez Garcés',
            'sexo' => 'masculino',
            'grado' => 'sexto',
            'fecha_nacimiento' => '1980-05-12',
            'curso' => 'A',
            'direccion' => 'Crr 28 # 30-08',
            'telefono_casa' => '2368965',
            'celular' => '3117258934'
        );
        $this->db->insert('estudiante', $data);

        $data = array(
            'id' => 7,
            'id_ruta' => 1,
            'nombres' => 'Jose Luis',
            'apellidos' => 'Carballo Lucero',
            'sexo' => 'masculino',
            'grado' => 'sexto',
            'fecha_nacimiento' => '1980-05-12',
            'curso' => 'A',
            'direccion' => 'Crr 28 # 30-08',
            'telefono_casa' => '2368965',
            'celular' => '3117258934'
        );
        $this->db->insert('estudiante', $data);

        $data = array(
            'id' => 8,
            'id_ruta' => 1,
            'nombres' => 'Francisco Isaac',
            'apellidos' => 'Gomez Marquez',
            'sexo' => 'masculino',
            'grado' => 'sexto',
            'fecha_nacimiento' => '1980-05-12',
            'curso' => 'A',
            'direccion' => 'Crr 28 # 30-08',
            'telefono_casa' => '2368965',
            'celular' => '3117258934'
        );
        $this->db->insert('estudiante', $data);

        $data = array(
            'id' => 9,
            'id_ruta' => 1,
            'nombres' => 'Edgar Alejandro',
            'apellidos' => 'Guerrero Arroyo',
            'sexo' => 'femenino',
            'grado' => 'sexto',
            'fecha_nacimiento' => '1980-05-12',
            'curso' => 'A',
            'direccion' => 'Crr 28 # 30-08',
            'telefono_casa' => '2368965',
            'celular' => '3117258934'
        );
        $this->db->insert('estudiante', $data);

        $data = array(
            'id' => 10,
            'id_ruta' => 1,
            'nombres' => 'Mario Alejandro',
            'apellidos' => 'Huicochea Mason',
            'sexo' => 'femenino',
            'grado' => 'sexto',
            'fecha_nacimiento' => '1980-05-12',
            'curso' => 'A',
            'direccion' => 'Crr 28 # 30-08',
            'telefono_casa' => '2368965',
            'celular' => '3117258934'
        );
        $this->db->insert('estudiante', $data);

        $data = array(
            'id' => 11,
            'id_ruta' => 2,
            'nombres' => 'Gonzalo Arturo',
            'apellidos' => 'Montalvan Gamez',
            'sexo' => 'masculino',
            'grado' => 'sexto',
            'fecha_nacimiento' => '1980-05-12',
            'curso' => 'A',
            'direccion' => 'Crr 28 # 30-08',
            'telefono_casa' => '2368965',
            'celular' => '3117258934'
        );
        $this->db->insert('estudiante', $data);

        $data = array(
            'id' => 12,
            'id_ruta' => 1,
            'nombres' => 'Francisco Manuel',
            'apellidos' => 'Rodriguez Huerta',
            'sexo' => 'masculino',
            'grado' => 'sexto',
            'fecha_nacimiento' => '1980-05-12',
            'curso' => 'A',
            'direccion' => 'Crr 28 # 30-08',
            'telefono_casa' => '2368965',
            'celular' => '3117258934'
        );
        $this->db->insert('estudiante', $data);

        $data = array(
            'id' => 13,
            'id_ruta' => 1,
            'nombres' => 'Juan Manuel',
            'apellidos' => 'Castaño Sanchez',
            'sexo' => 'masculino',
            'grado' => 'sexto',
            'fecha_nacimiento' => '1980-05-12',
            'curso' => 'A',
            'direccion' => 'Crr 28 # 30-08',
            'telefono_casa' => '2368965',
            'celular' => '3117258934'
        );
        $this->db->insert('estudiante', $data);

        $data = array(
            'id' => 14,
            'id_ruta' => 1,
            'nombres' => 'Villafuerte Fernando',
            'apellidos' => 'Sanchez Castellanos',
            'sexo' => 'masculino',
            'grado' => 'sexto',
            'fecha_nacimiento' => '1980-05-12',
            'curso' => 'A',
            'direccion' => 'Crr 28 # 30-08',
            'telefono_casa' => '2368965',
            'celular' => '3117258934'
        );
        $this->db->insert('estudiante', $data);

        $data = array(
            'id' => 15,
            'id_ruta' => 1,
            'nombres' => 'Benjamin Manuel',
            'apellidos' => 'Sanchez Lengeling',
            'sexo' => 'femenino',
            'grado' => 'sexto',
            'fecha_nacimiento' => '1980-05-12',
            'curso' => 'A',
            'direccion' => 'Crr 28 # 30-08',
            'telefono_casa' => '2368965',
            'celular' => '3117258934'
        );
        $this->db->insert('estudiante', $data);

        $data = array(
            'id' => 16,
            'id_ruta' => 1,
            'nombres' => 'Jose Mario',
            'apellidos' => 'Vazquez Soria',
            'sexo' => 'femenino',
            'grado' => 'sexto',
            'fecha_nacimiento' => '1980-05-12',
            'curso' => 'A',
            'direccion' => 'Crr 28 # 30-08',
            'telefono_casa' => '2368965',
            'celular' => '3117258934'
        );
        $this->db->insert('estudiante', $data);

        $data = array(
            'id' => 17,
            'id_ruta' => 2,
            'nombres' => 'Juan Francisco',
            'apellidos' => 'Leyva Bonilla',
            'sexo' => 'masculino',
            'grado' => 'sexto',
            'fecha_nacimiento' => '1980-05-12',
            'curso' => 'A',
            'direccion' => 'Crr 28 # 30-08',
            'telefono_casa' => '2368965',
            'celular' => '3117258934'
        );
        $this->db->insert('estudiante', $data);

        $data = array(
            'id' => 18,
            'id_ruta' => 1,
            'nombres' => 'Boryana Cristina',
            'apellidos' => 'Lopez Kolkovska',
            'sexo' => 'masculino',
            'grado' => 'sexto',
            'fecha_nacimiento' => '1980-05-12',
            'curso' => 'A',
            'direccion' => 'Crr 28 # 30-08',
            'telefono_casa' => '2368965',
            'celular' => '3117258934'
        );
        $this->db->insert('estudiante', $data);

        $data = array(
            'id' => 19,
            'id_ruta' => 1,
            'nombres' => 'Laura Cecilia',
            'apellidos' => 'Avila Jáuregui',
            'sexo' => 'masculino',
            'grado' => 'sexto',
            'fecha_nacimiento' => '1980-05-12',
            'curso' => 'A',
            'direccion' => 'Crr 28 # 30-08',
            'telefono_casa' => '2368965',
            'celular' => '3117258934'
        );
        $this->db->insert('estudiante', $data);

        $data = array(
            'id' => 20,
            'id_ruta' => 1,
            'nombres' => 'Monica Itzuri',
            'apellidos' => 'Delgado Carrillo',
            'sexo' => 'masculino',
            'grado' => 'sexto',
            'fecha_nacimiento' => '1980-05-12',
            'curso' => 'A',
            'direccion' => 'Crr 28 # 30-08',
            'telefono_casa' => '2368965',
            'celular' => '3117258934'
        );
        $this->db->insert('estudiante', $data);

        $data = array(
            'id' => 21,
            'id_ruta' => 1,
            'nombres' => 'Marco Antonio',
            'apellidos' => 'Figueroa Ibarra',
            'sexo' => 'femenino',
            'grado' => 'sexto',
            'fecha_nacimiento' => '1980-05-12',
            'curso' => 'A',
            'direccion' => 'Crr 28 # 30-08',
            'telefono_casa' => '2368965',
            'celular' => '3117258934'
        );
        $this->db->insert('estudiante', $data);

        $data = array(
            'id' => 22,
            'id_ruta' => 1,
            'nombres' => 'Mariano Cristóbal',
            'apellidos' => 'Franco De Leon',
            'sexo' => 'femenino',
            'grado' => 'sexto',
            'fecha_nacimiento' => '1980-05-12',
            'curso' => 'A',
            'direccion' => 'Crr 28 # 30-08',
            'telefono_casa' => '2368965',
            'celular' => '3117258934'
        );
        $this->db->insert('estudiante', $data);

        $data = array(
            'id' => 23,
            'id_ruta' => 2,
            'nombres' => ' Laura Mireya',
            'apellidos' => 'Gutierrez Quintal',
            'sexo' => 'masculino',
            'grado' => 'sexto',
            'fecha_nacimiento' => '1980-05-12',
            'curso' => 'A',
            'direccion' => 'Crr 28 # 30-08',
            'telefono_casa' => '2368965',
            'celular' => '3117258934'
        );
        $this->db->insert('estudiante', $data);

        $data = array(
            'id' => 24,
            'id_ruta' => 1,
            'nombres' => 'Alejandra Donaji',
            'apellidos' => 'Herrera Reyes',
            'sexo' => 'masculino',
            'grado' => 'sexto',
            'fecha_nacimiento' => '1980-05-12',
            'curso' => 'A',
            'direccion' => 'Crr 28 # 30-08',
            'telefono_casa' => '2368965',
            'celular' => '3117258934'
        );
        $this->db->insert('estudiante', $data);
        $data = array(
            'id' => 25,
            'id_ruta' => 1,
            'nombres' => 'Alfredo Liobomir',
            'apellidos' => 'Herrera Reyes',
            'sexo' => 'masculino',
            'grado' => 'sexto',
            'fecha_nacimiento' => '1980-05-12',
            'curso' => 'A',
            'direccion' => 'Crr 28 # 30-08',
            'telefono_casa' => '2368965',
            'celular' => '3117258934'
        );
        $this->db->insert('estudiante', $data);

        $data = array(
            'id' => 26,
            'id_ruta' => 1,
            'nombres' => 'Alfredo Liobomir',
            'apellidos' => 'Lopez Kolkovsky',
            'sexo' => 'masculino',
            'grado' => 'sexto',
            'fecha_nacimiento' => '1980-05-12',
            'curso' => 'A',
            'direccion' => 'Crr 28 # 30-08',
            'telefono_casa' => '2368965',
            'celular' => '3117258934'
        );
        $this->db->insert('estudiante', $data);

        $data = array(
            'id' => 27,
            'id_ruta' => 1,
            'nombres' => 'Carmen Delia ',
            'apellidos' => 'Mares Orozco',
            'sexo' => 'femenino',
            'grado' => 'sexto',
            'fecha_nacimiento' => '1980-05-12',
            'curso' => 'A',
            'direccion' => 'Crr 28 # 30-08',
            'telefono_casa' => '2368965',
            'celular' => '3117258934'
        );
        $this->db->insert('estudiante', $data);

        $data = array(
            'id' => 28,
            'id_ruta' => 1,
            'nombres' => 'Jose Ulises',
            'apellidos' => 'Marquez Urbina',
            'sexo' => 'femenino',
            'grado' => 'sexto',
            'fecha_nacimiento' => '1980-05-12',
            'curso' => 'A',
            'direccion' => 'Crr 28 # 30-08',
            'telefono_casa' => '2368965',
            'celular' => '3117258934'
        );
        $this->db->insert('estudiante', $data);

        $data = array(
            'id' => 29,
            'id_ruta' => 2,
            'nombres' => 'Jorge Armando',
            'apellidos' => 'Moreno Llamas',
            'sexo' => 'masculino',
            'grado' => 'sexto',
            'fecha_nacimiento' => '1980-05-12',
            'curso' => 'A',
            'direccion' => 'Crr 28 # 30-08',
            'telefono_casa' => '2368965',
            'celular' => '3117258934'
        );
        $this->db->insert('estudiante', $data);

        $data = array(
            'id' => 30,
            'id_ruta' => 1,
            'nombres' => 'Ernesto Adolfo',
            'apellidos' => 'Perez Urquidi',
            'sexo' => 'masculino',
            'grado' => 'sexto',
            'fecha_nacimiento' => '1980-05-12',
            'curso' => 'A',
            'direccion' => 'Crr 28 # 30-08',
            'telefono_casa' => '2368965',
            'celular' => '3117258934'
        );
        $this->db->insert('estudiante', $data);

        $data = array(
            'id' => 31,
            'id_ruta' => 3,
            'nombres' => 'Juan',
            'apellidos' => 'Jaramillo',
            'sexo' => 'masculino',
            'grado' => 'sexto',
            'fecha_nacimiento' => '1980-05-12',
            'curso' => 'A',
            'direccion' => 'Crr 28 # 30-08',
            'telefono_casa' => '2368965',
            'celular' => '3117258934'
        );
        $this->db->insert('estudiante', $data);

        $data = array(
            'id' => 32,
            'id_ruta' => 3,
            'nombres' => 'Maria Antonia',
            'apellidos' => 'Lopez Gutierrez',
            'sexo' => 'femenino',
            'grado' => 'sexto',
            'fecha_nacimiento' => '1980-05-12',
            'curso' => 'A',
            'direccion' => 'Crr 28 # 30-08',
            'telefono_casa' => '2368965',
            'celular' => '3117258934'
        );
        $this->db->insert('estudiante', $data);
    }

    private function bitacora_estudiante() {
        $this->db->empty_table('bitacora_estudiante');
        $data = array(
            'id' => 1,
            'id_estudiante' => 1,
            'id_ruta' => 1,
            'destino' => 'colegio',
            'abordo' => 'no'
        );
        $this->db->insert('bitacora_estudiante', $data);

        $data = array(
            'id' => 2,
            'id_estudiante' => 10,
            'id_ruta' => 1,
            'destino' => 'colegio',
            'abordo' => 'si'
        );
        $this->db->insert('bitacora_estudiante', $data);
    }

    private function acudiente() {
        $this->db->empty_table('acudiente');
        $data = array(
            'id' => 1,
            'nombres' => 'Maria Soledad',
            'apellidos' => 'Gómez Ramírez',
            'sexo' => 'femenino',
            'telefono1' => '5690685',
            'telefono3' => '3115784453',
            'email' => 'luismec90@gmail.com'
        );
        $this->db->insert('acudiente', $data);

        $data = array(
            'id' => 2,
            'nombres' => 'Oscar Alejandro',
            'apellidos' => 'Montoya Castaño',
            'sexo' => 'masculino',
            'telefono1' => '5690685',
            'telefono3' => '321578123',
            'email' => 'luismec90@gmail.com'
        );
        $this->db->insert('acudiente', $data);

        $data = array(
            'id' => 3,
            'nombres' => 'Juan',
            'apellidos' => 'Lopera',
            'sexo' => 'masculino',
            'telefono1' => '5690685',
            'telefono3' => '3111234453',
            'email' => 'luismec90@gmail.com'
        );
        $this->db->insert('acudiente', $data);


        $data = array(
            'id' => 4,
            'nombres' => 'Adriana',
            'apellidos' => 'Arboleda',
            'sexo' => 'femenino',
            'telefono1' => '5690685',
            'telefono3' => '3005745653',
            'email' => 'luismec90@gmail.com'
        );
        $this->db->insert('acudiente', $data);
    }

    private function estudiante_x_acudiente() {
        $this->db->empty_table('estudiante_x_acudiente');
        $data = array(
            'id' => 1,
            'id_estudiante' => 1,
            'id_acudiente' => 1,
            'parentesco' => 'hijo'
        );
        $this->db->insert('estudiante_x_acudiente', $data);

        $data = array(
            'id' => 2,
            'id_estudiante' => 2,
            'id_acudiente' => 1,
            'parentesco' => 'hijo'
        );
        $this->db->insert('estudiante_x_acudiente', $data);
        $data = array(
            'id' => 3,
            'id_estudiante' => 3,
            'id_acudiente' => 1,
            'parentesco' => 'hijo'
        );
        $this->db->insert('estudiante_x_acudiente', $data);
        $data = array(
            'id' => 4,
            'id_estudiante' => 4,
            'id_acudiente' => 1,
            'parentesco' => 'hijo'
        );
        $this->db->insert('estudiante_x_acudiente', $data);
        $data = array(
            'id' => 5,
            'id_estudiante' => 5,
            'id_acudiente' => 2,
            'parentesco' => 'hijo'
        );
        $this->db->insert('estudiante_x_acudiente', $data);
        $data = array(
            'id' => 6,
            'id_estudiante' => 6,
            'id_acudiente' => 2,
            'parentesco' => 'hijo'
        );
        $this->db->insert('estudiante_x_acudiente', $data);
        $data = array(
            'id' => 7,
            'id_estudiante' => 7,
            'id_acudiente' => 2,
            'parentesco' => 'hijo'
        );
        $this->db->insert('estudiante_x_acudiente', $data);
        $data = array(
            'id' => 8,
            'id_estudiante' => 8,
            'id_acudiente' => 2,
            'parentesco' => 'hijo'
        );
        $this->db->insert('estudiante_x_acudiente', $data);
        $data = array(
            'id' => 9,
            'id_estudiante' => 9,
            'id_acudiente' => 2,
            'parentesco' => 'hijo'
        );
        $this->db->insert('estudiante_x_acudiente', $data);
        $data = array(
            'id' => 10,
            'id_estudiante' => 10,
            'id_acudiente' => 1,
            'parentesco' => 'hijo'
        );
        $this->db->insert('estudiante_x_acudiente', $data);
        $data = array(
            'id' => 11,
            'id_estudiante' => 11,
            'id_acudiente' => 1,
            'parentesco' => 'hijo'
        );
        $this->db->insert('estudiante_x_acudiente', $data);
        $data = array(
            'id' => 12,
            'id_estudiante' => 12,
            'id_acudiente' => 1,
            'parentesco' => 'hijo'
        );
        $this->db->insert('estudiante_x_acudiente', $data);
        $data = array(
            'id' => 13,
            'id_estudiante' => 13,
            'id_acudiente' => 1,
            'parentesco' => 'hijo'
        );
        $this->db->insert('estudiante_x_acudiente', $data);
        $data = array(
            'id' => 14,
            'id_estudiante' => 14,
            'id_acudiente' => 1,
            'parentesco' => 'hijo'
        );
        $this->db->insert('estudiante_x_acudiente', $data);
        $data = array(
            'id' => 15,
            'id_estudiante' => 15,
            'id_acudiente' => 1,
            'parentesco' => 'hijo'
        );
        $this->db->insert('estudiante_x_acudiente', $data);
        $data = array(
            'id' => 16,
            'id_estudiante' => 16,
            'id_acudiente' => 1,
            'parentesco' => 'hijo'
        );
        $this->db->insert('estudiante_x_acudiente', $data);
        $data = array(
            'id' => 17,
            'id_estudiante' => 17,
            'id_acudiente' => 1,
            'parentesco' => 'hijo'
        );
        $this->db->insert('estudiante_x_acudiente', $data);

        $data = array(
            'id' => 18,
            'id_estudiante' => 18,
            'id_acudiente' => 1,
            'parentesco' => 'hijo'
        );
        $this->db->insert('estudiante_x_acudiente', $data);
        $data = array(
            'id' => 19,
            'id_estudiante' => 19,
            'id_acudiente' => 1,
            'parentesco' => 'hija'
        );

        $this->db->insert('estudiante_x_acudiente', $data);
        $data = array(
            'id' => 20,
            'id_estudiante' => 20,
            'id_acudiente' => 1,
            'parentesco' => 'hijo'
        );

        $this->db->insert('estudiante_x_acudiente', $data);
        $data = array(
            'id' => 21,
            'id_estudiante' => 21,
            'id_acudiente' => 1,
            'parentesco' => 'hijo'
        );

        $this->db->insert('estudiante_x_acudiente', $data);
        $data = array(
            'id' => 22,
            'id_estudiante' => 22,
            'id_acudiente' => 1,
            'parentesco' => 'hijo'
        );

        $this->db->insert('estudiante_x_acudiente', $data);
        $data = array(
            'id' => 23,
            'id_estudiante' => 23,
            'id_acudiente' => 1,
            'parentesco' => 'hijo'
        );

        $this->db->insert('estudiante_x_acudiente', $data);
        $data = array(
            'id' => 24,
            'id_estudiante' => 24,
            'id_acudiente' => 1,
            'parentesco' => 'hijo'
        );

        $this->db->insert('estudiante_x_acudiente', $data);
        $data = array(
            'id' => 25,
            'id_estudiante' => 25,
            'id_acudiente' => 1,
            'parentesco' => 'hijo'
        );
        $this->db->insert('estudiante_x_acudiente', $data);

        $data = array(
            'id' => 26,
            'id_estudiante' => 26,
            'id_acudiente' => 1,
            'parentesco' => 'hijo'
        );
        $this->db->insert('estudiante_x_acudiente', $data);

        $data = array(
            'id' => 27,
            'id_estudiante' => 27,
            'id_acudiente' => 1,
            'parentesco' => 'hijo'
        );
        $this->db->insert('estudiante_x_acudiente', $data);

        $data = array(
            'id' => 28,
            'id_estudiante' => 28,
            'id_acudiente' => 1,
            'parentesco' => 'hijo'
        );
        $this->db->insert('estudiante_x_acudiente', $data);

        $data = array(
            'id' => 29,
            'id_estudiante' => 29,
            'id_acudiente' => 1,
            'parentesco' => 'hijo'
        );
        $this->db->insert('estudiante_x_acudiente', $data);

        $data = array(
            'id' => 30,
            'id_estudiante' => 30,
            'id_acudiente' => 1,
            'parentesco' => 'hijo'
        );
        $this->db->insert('estudiante_x_acudiente', $data);

        $data = array(
            'id' => 31,
            'id_estudiante' => 31,
            'id_acudiente' => 3,
            'parentesco' => 'hijo'
        );
        $this->db->insert('estudiante_x_acudiente', $data);

        $data = array(
            'id' => 32,
            'id_estudiante' => 32,
            'id_acudiente' => 3,
            'parentesco' => 'hija'
        );
        $this->db->insert('estudiante_x_acudiente', $data);

        $data = array(
            'id' => 33,
            'id_estudiante' => 31,
            'id_acudiente' => 4,
            'parentesco' => 'hijo'
        );
        $this->db->insert('estudiante_x_acudiente', $data);

        $data = array(
            'id' => 34,
            'id_estudiante' => 32,
            'id_acudiente' => 4,
            'parentesco' => 'hija'
        );
        $this->db->insert('estudiante_x_acudiente', $data);
    }

    private function asunto() {
        $this->db->empty_table('asunto');
        $data = array(
            'id' => 1,
            'asunto' => 'Cierre de Vía',
            'mensaje' => 'Le informamos que la ruta presentará retrasos el día de hoy en el recorrido debido al cierre de la vía.',
        );
        $this->db->insert('asunto', $data);

        $data = array(
            'id' => 2,
            'asunto' => 'Tráfico en la Zona',
            'mensaje' => 'Le informamos que la ruta presentará retrasos el día de hoy en el recorrido debido al alto tráfico en la zona.',
        );
        $this->db->insert('asunto', $data);

        $data = array(
            'id' => 3,
            'asunto' => 'Retraso de Ruta',
            'mensaje' => 'Le informamos que la ruta presentará retrasos el día de hoy para recoger a su hijo.',
        );
        $this->db->insert('asunto', $data);

        $data = array(
            'id' => 4,
            'asunto' => 'Cambio de Recorrido',
            'mensaje' => 'Le informamos que la ruta presentará cambios en el recorrido el día de hoy previamente autorizados por el colegio.',
        );
        $this->db->insert('asunto', $data);
    }

    private function copia_email() {
        $this->db->empty_table('copia_email');

        $data = array(
            'id' => 1,
            'email' => 'luismec90@hotmail.com'
        );
        $this->db->insert('copia_email', $data);

        $data = array(
            'id' => 2,
            'email' => 'lfmontoyag@unal.edu.co'
        );
        $this->db->insert('copia_email', $data);
    }

    private function historico() {
        $this->db->empty_table('historico');
    }

}
