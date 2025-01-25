<?php

namespace App\Http\Controllers;

use Carbon\Traits\ToStringFormat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pageController extends Controller
{
    public function homePage(){
        return view('home', ['page' => 'Wiki-Honkai Star Rail | Home']);
    }

    public function getCharacters(){
        $five_star = DB::select('SELECT character_name, character_image, character_type_image FROM characters
            JOIN character_types ON characters.character_type_id = character_types.character_type_id WHERE character_rarity = 0 ORDER BY character_name ASC ');

        $four_star = DB::select('SELECT character_name, character_image, character_type_image FROM characters
        JOIN character_types ON characters.character_type_id = character_types.character_type_id WHERE character_rarity = 1 ORDER BY character_name ASC');

        return view('characters',
        [
            'page' => 'Wiki: Honkai Star Rail | Characters',
            'five_star' => $five_star,
            'four_star' => $four_star
        ]);
    }

    public function getCharacter(Request $request){

        // Old way to get only the name
        // $name = "Character: ".DB::table('characters')->select('character_name')->where('character_id', $request->id)->first()->character_name;

        $character = DB::select('SELECT character_name, character_image, character_type_image, character_trailer, character_demo, basic_atk_img, basic_atk_name,
            basic_atk_description, skill_img, skill_name, skill_description, ultimate_img, ultimate_name, ultimate_description, talent_img, talent_name, talent_description,
            technique_img, technique_name, technique_description FROM characters
            JOIN character_types ON characters.character_type_id = character_types.character_type_id
            LEFT JOIN character_video ON characters.character_id = character_video.character_id
            JOIN character_abilities ON character_abilities.character_id = characters.character_id
            WHERE characters.character_name = ?', [$request->name]);

        // dd($character);
        return view('character',
        [
            'page' => "Character: ".$request->name,
            'character' => $character
        ]);
    }


    public function getLightcones(){
        $lightcones_5_star = DB::select('SELECT lightcone_id, lightcone_name, lightcone_image, lightcone_rarity, lightcone_path_name, lightcone_path_image FROM lightcones
            JOIN lightcone_path ON lightcones.lightcone_path_id = lightcone_path.lightcone_path_id WHERE lightcone_rarity = 5');

        $lightcones_4_star = DB::select('SELECT lightcone_id, lightcone_name, lightcone_image, lightcone_rarity, lightcone_path_name, lightcone_path_image FROM lightcones
            JOIN lightcone_path ON lightcones.lightcone_path_id = lightcone_path.lightcone_path_id WHERE lightcone_rarity = 4');

        $lightcones_3_star = DB::select('SELECT lightcone_id, lightcone_name, lightcone_image, lightcone_rarity, lightcone_path_name, lightcone_path_image FROM lightcones
            JOIN lightcone_path ON lightcones.lightcone_path_id = lightcone_path.lightcone_path_id WHERE lightcone_rarity = 3');

        return view('lightcones',
        [   
            'page' => 'Wiki: Honkai Star Rail | Lightcones',
            'lightcones_5_star' => $lightcones_5_star,
            'lightcones_4_star' => $lightcones_4_star,
            'lightcones_3_star' => $lightcones_3_star
        ]);
    }

    public function getLightcone(Request $request){
        
        $lightcone = DB::select('SELECT lightcone_name, lightcone_image, lightcone_rarity, lightcone_path_name, lightcone_path_image, lightcone_passive_name, lightcone_passive,
                lightcone_base_hp, lightcone_base_atk, lightcone_base_def, lightcone_max_hp, lightcone_max_atk, lightcone_max_def FROM lightcones
            JOIN lightcone_path ON lightcones.lightcone_path_id = lightcone_path.lightcone_path_id
            JOIN lightcone_stats ON lightcones.lightcone_id = lightcone_stats.lightcone_id
            WHERE lightcones.lightcone_name = ?', [$request->name]);

        return view('lightcone',
        [   
            'page' => "Lightcone: ".$request->name,
            'lightcone' => $lightcone
        ]);
    }

    public function getBanners(){
        $character_banners = DB::select('SELECT character_name, character_image, banner_image, banner_version, banner_name FROM character_banners
            JOIN characters ON character_banners.featured_5_star = characters.character_id
            ORDER BY banner_version DESC');
        
        $character_4_star = DB::select('SELECT character_name, character_image, banner_name FROM featured_banner_4_star
            JOIN characters ON featured_banner_4_star.featured_4_star_character = characters.character_id
            JOIN character_banners ON character_banners.character_banner_id = featured_banner_4_star.character_banner_id');

        $lightcone_banners = DB::select('SELECT lightcone_image, banner_image, banner_version, banner_name FROM lightcone_banners
            JOIN lightcones ON lightcone_banners.featured_5_star = lightcones.lightcone_id
            ORDER BY banner_version DESC');

        $lightcone_4_star = DB::select('SELECT lightcone_image, banner_name FROM featured_banner_4_star
            JOIN lightcones ON featured_banner_4_star.featured_4_star_lightcone = lightcones.lightcone_id
            JOIN lightcone_banners ON featured_banner_4_star.lightcone_banner_id = lightcone_banners.lightcone_banner_id');

        // dd($lightcone_4_star);

        return view('banners',
        [   'page' => 'Wiki: Honkai Star Rail | Banners',
            'character_banners' => $character_banners,
            'four_star_characters' => $character_4_star,
            'lightcone_banners' => $lightcone_banners,
            'four_star_lightcones' => $lightcone_4_star
        ]);
    }

    public function getRelics(){
        $relic_set = DB::select('SELECT relic_set_name, relic_set_image, relic_2pc_bonus, relic_4pc_bonus FROM relic_sets ORDER BY relic_set_id ASC');

        $relic_pieces = DB::select('SELECT relic_piece_type_name, relic_piece_image, relic_set_name FROM relic_pieces
            JOIN relic_sets ON relic_pieces.relic_set = relic_sets.relic_set_id
            JOIN relic_piece_type ON relic_piece_type.relic_piece_type_id = relic_pieces.relic_piece_type');

        $ornament_set = DB::select('SELECT ornament_set_name, ornament_set_image, ornament_2pc_bonus FROM ornament_sets ORDER BY ornament_set_id ASC');

        $ornament_pieces = DB::select('SELECT ornament_piece_type_name, ornament_piece_image, ornament_set_name FROM ornament_pieces
            JOIN ornament_sets ON ornament_pieces.ornament_set = ornament_sets.ornament_set_id
            JOIN ornament_piece_type ON ornament_piece_type.ornament_piece_type_id = ornament_pieces.ornament_piece_type');

        return view('relics',
        [
            'page' => 'Wiki: Honkai Star Rail | Relics',
            'relic_set' => $relic_set,
            'relic_pieces' => $relic_pieces,
            'ornament_set' => $ornament_set,
            'ornament_pieces' => $ornament_pieces,
        ]);
    }

    public function getMaterials(){
        $materials = DB::select('SELECT material_type_id, material_type_name FROM materials_types');
        $material_type_1 = DB::select('SELECT material_name, material_description, material_rarity, material_image FROM materials
            WHERE material_type_id = 1 ORDER BY material_rarity ASC');
        $material_type_2 = DB::select('SELECT material_name, material_description, material_rarity, material_image FROM materials
            WHERE material_type_id = 2 ORDER BY material_rarity ASC');
        $material_type_3 = DB::select('SELECT material_name, material_description, material_rarity, material_image FROM materials
            WHERE material_type_id = 3 ORDER BY material_rarity ASC');
        $material_type_4 = DB::select('SELECT material_name, material_description, material_rarity, material_image FROM materials
            WHERE material_type_id = 4 ORDER BY material_rarity ASC');

        // dd($materials);
        return view('materials',
        [
            'page' => 'Wiki: Honkai Star Rail | Materials',
            'materials' => $materials,
            'material_type_1' => $material_type_1,
            'material_type_2' => $material_type_2,
            'material_type_3' => $material_type_3,
            'material_type_4' => $material_type_4
        ]);
    }
}