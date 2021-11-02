<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Expediente;
use App\Models\Abogado;
use App\Models\Archivo;
use App\Models\Procurador;
use Illuminate\Database\Seeder;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $user4 = new User();
        $user4->name = 'admin';
        $user4->email= 'admin@gmail.com';
        $user4->password = bcrypt('admin');
        
        $user4->save();

        $abogado1= new Abogado();

        $abogado1->ci='452376';
        $abogado1->nombre='Lisa Martinez';
        $abogado1->sexo='Femenino';
        $abogado1->telefono='74183266';
        $abogado1->email='lisa@gmail.com';
        $abogado1->domicilio='Calle Uruguay';
        $abogado1->save();
        
        $procurador1=new Procurador();
        $procurador1->ci='452376';
        $procurador1->nombre='Louis Tomlinson';
        $procurador1->sexo='Masculino';
        $procurador1->telefono='74165426';
        $procurador1->email='louis@gmail.com';
        $procurador1->domicilio='Av. Circunvalacion Calle Cotoca';
        $procurador1->save();

        $cliente1= new Cliente();

        $cliente1->ci='452376';
        $cliente1->nombre='Edvin Ryding';
        $cliente1->sexo='Masculino';
        $cliente1->telefono='74183266';
        $cliente1->domicilio='Calle Tajibo';
        $cliente1->save();


        $expediente1= new Expediente();
        $expediente1->id_Cliente='1';
        $expediente1->causa='2019001';
        $expediente1->codigo='F-M-2019';
        $expediente1->proceso='Explotacion laboral';
        $expediente1->demandante='Mariana Gonzales Peña';
        $expediente1->demandado='Omar Lopez Gutierrez';
        $expediente1->tribunal='Juzgado publico niñez y adolescencia n4';
        $expediente1->juez='';
        $expediente1->secretario='Edvin Añez Llanos';
        $expediente1->fecha='14/08/2019';
        $expediente1->hora='15:30';
        $expediente1->save();

        $archivo1= new Archivo();
        $archivo1->id_Exp='1';
        $archivo1->descripcion='Nuevo';
        $archivo1->imagen='C:\Users\MARINES\Downloads\WhatsApp Image 2021-10-28 at 02.15.49 (1).jpeg';
        $archivo1->fecha='21/10/20';
        $archivo1->hora='14:00';
       $archivo1->save();
    }
}
