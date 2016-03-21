<?php

use Illuminate\Database\Seeder;

class Tiv_statusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'tiv_statuses';

        DB::table($table)->delete();
        $data = [
            [ 'type' => 'valve',               'value' => 'Démontage aisé, pas de rouille, filets OK'],
            [ 'type' => 'valve',               'value' => 'Démontage aisé, rouille sur le fond, filets OK'],
            [ 'type' => 'valve',               'value' => 'Démontage aisé, rouille sur les filets, filets OK'],
            [ 'type' => 'valve',               'value' => 'Démontage aisé, rouille fond & filets, filets OK'],
            [ 'type' => 'valve',               'value' => 'Démontage aisé, filets KO, à changer'],
            [ 'type' => 'valve',               'value' => 'Démontage dur, pas de rouille, filets OK'],
            [ 'type' => 'valve',               'value' => 'Démontage dur, rouille sur le fond, filets OK'],
            [ 'type' => 'valve',               'value' => 'Démontage dur, rouille sur les filets, filets OK'],
            [ 'type' => 'valve',               'value' => 'Démontage dur, rouille fond & filets, filets OK'],
            [ 'type' => 'valve',               'value' => 'Démontage dur, filets KO, à changer'],
            [ 'type' => 'valve_ring',          'value' => 'Bagues OK'],
            [ 'type' => 'valve_ring',          'value' => 'Bague lisse limite'],
            [ 'type' => 'valve_ring',          'value' => 'Bague filetée limite'],
            [ 'type' => 'valve_ring',          'value' => 'Bague lisse et filetée limite'],
            [ 'type' => 'valve_ring',          'value' => 'Bague lisse entre'],
            [ 'type' => 'valve_ring',          'value' => 'Bague filetée visse'],
            [ 'type' => 'neck_thread',         'value' => 'Filetage col OK'],
            [ 'type' => 'neck_thread',         'value' => 'Filetage légèrement oxydés'],
            [ 'type' => 'neck_thread',         'value' => 'Filetage actifs détériorés'],
            [ 'type' => 'neck_thread_size',    'value' => 'Tampons OK'],
            [ 'type' => 'neck_thread_size',    'value' => 'Tampon lisse limite'],
            [ 'type' => 'neck_thread_size',    'value' => 'Tampon fileté limite'],
            [ 'type' => 'neck_thread_size',    'value' => 'Tampons lisse et fileté limite'],
            [ 'type' => 'neck_thread_size',    'value' => 'Tampon lisse entre'],
            [ 'type' => 'neck_thread_size',    'value' => 'Tampon fileté visse'],
            [ 'type' => 'ext_state',           'value' => 'Peinture en bon état'],
            [ 'type' => 'ext_state',           'value' => 'Atteintes profondes'],
            [ 'type' => 'ext_state',           'value' => 'Cloques, écaillages non corrodés'],
            [ 'type' => 'ext_state',           'value' => 'Cloques, écaillages corrodés'],
            [ 'type' => 'ext_state',           'value' => 'Corrosion superficielle localisée'],
            [ 'type' => 'ext_state',           'value' => 'Corrosion superficielle généralisée'],
            [ 'type' => 'int_state',           'value' => 'Pas de corrosion'],
            [ 'type' => 'int_state',           'value' => 'Oxydation superficielle uniforme'],
            [ 'type' => 'int_state',           'value' => 'Oxydation superficielle généralisée'],
            [ 'type' => 'int_state',           'value' => 'Petite piqures réparties'],
            [ 'type' => 'int_state',           'value' => 'Piqures généralisées'],
            [ 'type' => 'int_state',           'value' => 'Piqures en ligne'],
            [ 'type' => 'int_state',           'value' => 'Piqures en bande'],
            [ 'type' => 'int_state',           'value' => 'Chancre au fond'],
            [ 'type' => 'int_state',           'value' => 'Chancre latéral'],
            [ 'type' => 'int_state',           'value' => 'Chancre latéral et au fond'],
            [ 'type' => 'int_state',           'value' => 'Corrosion feuilletante au fond'],
            [ 'type' => 'int_state',           'value' => 'Corrosion feuilletante latérale'],
            [ 'type' => 'int_state',           'value' => 'Corrosion feuilletante généralisée'],
            [ 'type' => 'int_residue',         'value' => 'Sec et sans résidus'],
            [ 'type' => 'int_residue',         'value' => 'Sec et Rouille'],
            [ 'type' => 'int_residue',         'value' => 'Humide'],
            [ 'type' => 'int_residue',         'value' => 'Eau'],
            [ 'type' => 'int_residue',         'value' => 'Rouille et eau'],
            [ 'type' => 'int_residue',         'value' => 'Rouille et huile'],
            [ 'type' => 'int_residue',         'value' => 'Rouille, huile et eau'],
            ['type' => 'todo_maintenance',      'value' => "Club : Brossage - Retouches Peinture"],
            ['type' => 'todo_maintenance',      'value' => "Club : Nettoyage"],
            ['type' => 'todo_maintenance',      'value' => "Club : Nettoyage - Brossage"],
            ['type' => 'todo_maintenance',      'value' => "Club : Nettoyage - Brossage - Retouche de peinture"],
            ['type' => 'todo_maintenance',      'value' => "Club : Nettoyage - Retouche de peinture"],
            ['type' => 'todo_maintenance',      'value' => "Club : Retouches Peinture"],
            ['type' => 'todo_maintenance',      'value' => "Club :Club :  Brossage"],
            ['type' => 'todo_maintenance',      'value' => "Prestataire : Peinture"],
            ['type' => 'todo_maintenance',      'value' => "Prestataire : Peinture - Sablage Intérieur"],
            ['type' => 'todo_maintenance',      'value' => "Prestataire : Requalification"],
            ['type' => 'todo_maintenance',      'value' => "Prestataire : Requalification - Peinture"],
            ['type' => 'todo_maintenance',      'value' => "Prestataire : Requalification - Sablage Intérieur"],
            ['type' => 'todo_maintenance',      'value' => "Prestataire : Requalification - Sablage Intérieur - Lavage - Séchage"],
            ['type' => 'todo_maintenance',      'value' => "Prestataire : Requalification - Sablage Intérieur - Lavage - Séchage - Peinture"],
            ['type' => 'todo_maintenance',      'value' => "Prestataire : Requalification - Sablage Intérieur - Peinture"],
            ['type' => 'todo_maintenance',      'value' => "Prestataire : Sablage Intérieur"],
            ['type' => 'todo_maintenance',      'value' => "Prestataire : Sablage Intérieur - Lavage - Séchage"],
            ['type' => 'performed_maintenance', 'value' => "Club : Brossage - Retouches Peinture"],
            ['type' => 'performed_maintenance', 'value' => "Club : Nettoyage"],
            ['type' => 'performed_maintenance', 'value' => "Club : Nettoyage - Brossage"],
            ['type' => 'performed_maintenance', 'value' => "Club : Nettoyage - Brossage - Retouche de peinture"],
            ['type' => 'performed_maintenance', 'value' => "Club : Nettoyage - Retouche de peinture"],
            ['type' => 'performed_maintenance', 'value' => "Club : Retouches Peinture"],
            ['type' => 'performed_maintenance', 'value' => "Club :Club :  Brossage"],
            ['type' => 'performed_maintenance', 'value' => "Prestataire : Peinture"],
            ['type' => 'performed_maintenance', 'value' => "Prestataire : Peinture - Sablage Intérieur"],
            ['type' => 'performed_maintenance', 'value' => "Prestataire : Requalification"],
            ['type' => 'performed_maintenance', 'value' => "Prestataire : Requalification - Peinture"],
            ['type' => 'performed_maintenance', 'value' => "Prestataire : Requalification - Sablage Intérieur"],
            ['type' => 'performed_maintenance', 'value' => "Prestataire : Requalification - Sablage Intérieur - Lavage - Séchage"],
            ['type' => 'performed_maintenance', 'value' => "Prestataire : Requalification - Sablage Intérieur - Lavage - Séchage - Peinture"],
            ['type' => 'performed_maintenance', 'value' => "Prestataire : Requalification - Sablage Intérieur - Peinture"],
            ['type' => 'performed_maintenance', 'value' => "Prestataire : Sablage Intérieur"],
            ['type' => 'performed_maintenance', 'value' => "Prestataire : Sablage Intérieur - Lavage - Séchage"],
            ['type' => 'review_status',         'value' => 'Expédié'],
            ['type' => 'review_status',         'value' => 'En cours'],
            ['type' => 'review_status',         'value' => 'Terminé'],
            ['type' => 'review',                'value' => 'Périodique'],
            ['type' => 'review',                'value' => 'Avant requalification'],
        ];

        DB::table($table)->insert($data);
    }
}
