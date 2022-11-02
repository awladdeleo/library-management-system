<?php
/**
 * Created by PhpStorm.
 * User: awlad
 * Date: 10/31/2022
 * Time: 12:53 AM
 */

namespace App\Services\User;


class UserService
{
    public static function serializeData($request){
        $data = [
            'email' => $request->input('email'),
            'image' => $request->input('image'),
        ];

        foreach (config('translatable.locales') as $locale){
            $data[$locale['code']] = [
                'name' => $request->input('name'),
                'phone' => $request->input('phone')
            ];
        }

        return $data;
    }

    public static function updateSerializeData($request){
        $data = [
            'email' => $request->input('email'),
            'image' => $request->input('image'),
        ];

        $data[app()->getLocale()] = [
            'name' => $request->input('name'),
            'phone' => $request->input('phone')
        ];

        return $data;
    }
}