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
        $user1 = new User();
        $user1->name = 'Lisa Martinez';
        $user1->email= 'lisa@gmail.com';
        $user1->password = bcrypt('12345');
        $user1->rol='abogado';
        $user1->save();

        $user2 = new User();
        $user2->name = 'Yuliana Barrios';
        $user2->email= 'yuliana@gmail.com';
        $user2->password = bcrypt('12345');
        $user2->rol='procurador';
        $user2->save();

       


        $user4 = new User();
        $user4->name = 'admin';
        $user4->email= 'admin@gmail.com';
        $user4->password = bcrypt('admin');
        $user4->rol='admin';
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

        $cliente2= new Cliente();

        $cliente2->ci='165464';
        $cliente2->nombre='Alejandra Barrientos';
        $cliente2->sexo='Femenino';
        $cliente2->telefono='74646266';
        $cliente2->domicilio='Calle Robles';
        $cliente2->save();



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
        $expediente1->fecha='15/08/2020';
        $expediente1->hora='18:30';
        $expediente1->save();

        $expediente2= new Expediente();
        $expediente2->id_Cliente='1';
        $expediente2->causa='2019001';
        $expediente2->codigo='F-M-2020';
        $expediente2->proceso='Divorcio';
        $expediente2->demandante='Gloria Peñaranda Calle';
        $expediente2->demandado='Paul Mendez Mendez';     
        $expediente2->juez='Mirtha Robles Zapata';
        $expediente2->secretario='Edvin Añez Llanos';
        $expediente2->fecha='14/09/2020';
        $expediente2->hora='11:10';
        $expediente2->save();

      
     

        $archivo1= new Archivo();
        $archivo1->id_Exp='1';
        $archivo1->descripcion='Nuevo';
        $archivo1->imagen='20211102182356.jpg';
        $archivo1->fecha='21/10/20';
        $archivo1->hora='14:00';
       $archivo1->save();
       
       $archivo2= new Archivo();
       $archivo2->id_Exp='2';
       $archivo2->descripcion='Actualizacion';
       $archivo2->imagen='20211102194952.jpg';
       $archivo2->fecha='21/10/20';
       $archivo2->hora='14:00';
      $archivo2->save();
}
}