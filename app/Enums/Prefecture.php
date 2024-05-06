<?php
namespace App\Enums;

enum Prefecture: string {
    case Aichi = "Aichi";
    case Akita = "Akita";
    case Aomori = "Aomori";
    case Chiba = "Chiba";
    case Ehime = "Ehime";
    case Fukui = "Fukui";
    case Fukuoka = "Fukuoka";
    case Fukushima = "Fukushima";
    case Gifu = "Gifu";
    case Gunma = "Gunma";
    case Hiroshima = "Hiroshima";
    case Hokkaido = "Hokkaido";
    case Hyogo = "Hyogo";
    case Ibaraki = "Ibaraki";
    case Ishikawa = "Ishikawa";
    case Iwate = "Iwate";
    case Kagawa = "Kagawa";
    case Kagoshima = "Kagoshima";
    case Kanagawa = "Kanagawa";
    case Kochi = "Kochi";
    case Kumamoto = "Kumamoto";
    case Kyoto = "Kyoto";
    case Mie = "Mie";
    case Miyagi = "Miyagi";
    case Miyazaki = "Miyazaki";
    case Nagano = "Nagano";
    case Nagasaki = "Nagasaki";
    case Nara = "Nara";
    case Niigata = "Niigata";
    case Oita = "Oita";
    case Okayama = "Okayama";
    case Okinawa = "Okinawa";
    case Osaka = "Osaka";
    case Saga = "Saga";
    case Saitama = "Saitama";
    case Shiga = "Shiga";
    case Shimane = "Shimane";
    case Shizuoka = "Shizuoka";
    case Tochigi = "Tochigi";
    case Tokushima = "Tokushima";
    case Tokyo = "Tokyo";
    case Tottori = "Tottori";
    case Toyama = "Toyama";
    case Wakayama = "Wakayama";
    case Yamagata = "Yamagata";
    case Yamaguchi = "Yamaguchi";
    case Yamanashi = "Yamanashi";

    public function label()
    {
        return (string) str($this->name)->replace('_',' ');
    }
}
