<?php
/**
 * Created by PhpStorm.
 * User: awlad
 * Date: 10/31/2022
 * Time: 11:57 PM
 */

namespace App\Services\Book;


use App\Models\BookCirculation;
use Brian2694\Toastr\Facades\Toastr;

class BookService
{
    public static function serializeData($request){
        $data = [
            'isbn_number' => $request->input('isbn'),
            'quantity' => $request->input('quantity'),
            'thumbnail' => $request->input('thumbnail'),
        ];

        foreach (config('translatable.locales') as $locale){
            $data[$locale['code']] = [
                'title' => $request->input('title'),
                'author' => $request->input('author'),
                'genre' => $request->input('genre'),
                'description' => $request->input('description')
            ];
        }

        return $data;
    }

    public static function updateSerializeData($request){
        $data = [
            'isbn_number' => $request->input('isbn'),
            'quantity' => $request->input('quantity'),
            'thumbnail' => $request->input('thumbnail'),
        ];

        $data[app()->getLocale()] = [
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'genre' => $request->input('genre'),
            'description' => $request->input('description')
        ];

        return $data;
    }

    public static function quantityCheck($user_id=null,$books=[]){
        $book = BookCirculation::where('user_id',$user_id)
            ->where('status',BookCirculation::CIRCULATION_STATUS['Issued'])
            ->count();

        if($book > 4 || ($book+count($books)) > 5){
            Toastr::error(__('circulation.QuantityGreaterThanFive'), __('circulation.BookCirculation'));
            return true;
        }else{
            return false;
        }
    }
}