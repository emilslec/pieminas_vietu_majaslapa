<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\Monument;
use App\Models\Description;
use App\Models\Interval;
use App\Models\PlaceDescription;
use App\Models\NewImages;
use App\Models\OldImages;
use App\Models\Document;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        Type::create(['title' => 'Piemineklis (Apaļskulptūra vai tamlīdzīgi)']);
        Type::create(['title' => 'Piemiņas zīme (plāksne vai kas necils)']);
        Type::create(['title' => 'Piemiņas vietas komplekss']);
        Type::create(['title' => 'Piemiņas vieta (bez izcēluma dabā)']);
        Type::create(['title' => 'Apbedījums (esošs vai simbolisks civilpersonai)']);
        Type::create(['title' => 'Apbedījums (esošs vai simbolisks cīnitājam, vai vairākiem']);
        Type::create(['title' => 'Karavīru kapi (arī vienai vai divām personām)']);
        Type::create(['title' => 'Muzejs vai ekspozīcija']);

        Interval::create(['title' => '1900 - 1910']);
        Interval::create(['title' => '1914 - 1918']);
        Interval::create(['title' => '1919 - 1920']);
        Interval::create(['title' => '1920 - 1939']);
        Interval::create(['title' => '1940 - 1941']);
        Interval::create(['title' => '1941 - 1945']);
        Interval::create(['title' => '1944 - 1953']);
        Interval::create(['title' => '1953 - 1985']);
        Interval::create(['title' => '1985 - 1990']);
        Interval::create(['title' => '1991 - ']);


        $m = Monument::create(['title' => 'Kapa vieta māksliniekam Kurtam Fridrihsonam (1911-1991)', 'state' => 'Rīga', 'location' => 'Pirmie Meža kapi, Aizsaules iela 2', 'people' => 'Fridrihsons Kurts, Stērste Elza, Lase Ieva, Silmale Maija, Ozoliņš Miervaldis, Sirsone Skaidrīte, Lībiete-Ersa Mirdza, Sausnes Eleonora un Alfrēds, Stubaui Irina un Arnolds, Bērziņš Gustavs, Grīnfelde Milda', 'cover' => 'new']);
        Description::create(['content' => '1951.gada janvārī apcietina to daļu kultūras darbinieku, kas 1946. un 1947.gadā epizodiski bija pulcējušies Rīgas dzīvokļos un pēckara Rīgas drūmajā atmosfērā centās kliedēt nospiedošo atmosfēru runājot par mākslu, mūziku, literatūru un tml. galvenokārt pievēršoties franču kultūrai. Notiesāja un GULAGA nometnēs ieslodzīja kopumā 13 personas. Čekas (VDK) nolūks bija iebiedēt latviešu inteliģenci un lai notiesājošais spriedums būtu bargāks, to nosauca par "franču grupu"', 'monument_id' => $m->id,]);
        PlaceDescription::create(['content' => 'Apbedījums atrodas Meža kapu Mākslinieku kalniņā. Ir piemineklis. Vairāk informācijas Okupācijas muzeja tematiskajā burtnīcā XX gadsimta politiskā vēsture piemiņas vietās "Mākslinieks Kurts Fridrihsons un "franču grupa"", R.,2021.', 'monument_id' => $m->id,]);

        $m->types()->attach([5]);
        $m->intervals()->attach([7]);
        NewImages::create(['monument_id' => $m->id, 'path' => 'images/1/recent/haJYrq7zWbKx3k16tH7h1IcQ8oDqaW800YRwxHTb.jpg', 'description' => 'Kapa vieta. 2021. R.Pētersona foto',]);

        OldImages::create(['monument_id' => $m->id, 'path' => 'images/1/historical/ThaivVOcU6sSUxRa1vkJ4IxuMy3FDNzCQXvVXQwC.jpg', 'description' => 'Kurts Fridrihsons ieslodzījuma foto. Nezināms autors.',]);

        OldImages::create(['monument_id' => $m->id, 'path' => 'images/1/historical/AzW8488EGARnRbLk36IMXIvXJ2J6Cl87eJl53dc2.jpg', 'description' => 'Uzskaites kartiņa',]);

        OldImages::create(['monument_id' => $m->id, 'path' => 'images/1/historical/ZJWymEuxjXnhDD50csSzZcpQiwLRzOes1jZEfeTw.jpg', 'description' => 'Reklāmas stendi pie Mākslas muzeja izstādei "Klusuma zonā". 2006. R.Pētersona foto',]);

        Document::create(['monument_id' => $m->id, 'path' => 'images/1/documents/7WSmBcPBdvwlhAWXUlYW0nfKl535fXJSCDpl8V7G.jpg', 'description' => 'Okupācijas muzeja krājums',]);

        Document::create(['monument_id' => $m->id, 'path' => 'images/1/documents/HGe77bZNzJDv7c5B9v1VpUCZVYZAZeyoFwc79Wsj.jpg', 'description' => 'Pastkarte Frdidrihsons sievai Zentai 1954.g. Okupācijas muzeja krājums',]);

        Document::create(['monument_id' => $m->id, 'path' => 'images/1/documents/r6W3OaAV8UYcsh8m5youWZt702LA34lPcjHLAfwb.jpg', 'description' => 'Pastkarte. 1954. Otra puse',]);

        $m = Monument::create(['title' => 'Kantātes "Dievs, Tava zeme deg" pirmatskaņojuma vieta Vecajā Sv.Ģertrūdes baznīcā', 'state' => 'Rīga', 'location' => 'Vecā Sv.Ģertrūdes baznīca Ģertrūdes ielā 6', 'people' => 'Garūta Lūcija, Eglītis Andrejs, Reiters Teodors, Vētra Mariss, Kaktiņš Ādolfs, Sakārnis Oskars', 'cover' => 'new']);
        Description::create(['content' => '1944.gada 15.martā dievnamā notika kantātes "Dievs, Tava zeme deg" pirmatskaņojums. Kantāti izpildīja Teodora Reitera koris, solisti Mariss Vētra un Ādolfs Kaktiņš. Pie ērģelēm bija kantātes komponiste Lūcija Garūta. Kantātes teksta autors dzejnieks Andrejs Eglītis ieguva godalgu Kuldīgas Sv.Annas draudzes 1943.gada maijā izsludinātajā konkursā par tēmu "Latvju lūgšana", ko draudzes mācītājs Oskars Sakārnis raksturoja kā nepieciešamību ar šo lūgšanu skart tautas dvēseli, kas stiprinātu mūs darba un cīņas gaitās un celtu Dieva pilnībai pretī. Padomju okupācijas gados Kantāte ir aizliegta līdz Atmodas laikam. 1988.gadā to izpilda kamerkoris "Ave Sol".', 'monument_id' => $m->id,]);
        PlaceDescription::create(['content' => 'Vecā Sv.Ģertrūdes baznīca 1200 sēdvietām celta 1869.gadā. Tās arhitekts ir Johans Danies Felsko, firmas "W.Sauer" (Vācija) ērģeles uzstādītas 1906.gadā. Tas ir trīs manuāļu un 45 reģistru instruments. Vairāk informācijas: Okupācijas muzeja tematiskajā burtnīcā XX gadsimta politiskā vēsture piemiņas vietās "Kantāte, Dievs Tava zeme deg". R.,2023.', 'monument_id' => $m->id,]);

        $m->types()->attach([4]);
        $m->intervals()->attach([6]);
        NewImages::create(['monument_id' => $m->id, 'path' => 'images/2/recent/okLKJFIzI5FjZCXjSfcMXuJkJ1AkX264RlpdmCac.jpg', 'description' => 'Vecās Sv.Ģertrūdes baznīcas galvenā fasāde no Brīvības ielas puses. 2020.g.foto. Autors R.Pētersons',]);

        NewImages::create(['monument_id' => $m->id, 'path' => 'images/2/recent/fjBQtQqNe4YJ43Zg4giyKcQLducX19BzB2vRuEzY.jpg', 'description' => 'Baznīcas ērģeļu balkons. Foto 2020, R.Pētersons',]);

        NewImages::create(['monument_id' => $m->id, 'path' => 'images/2/recent/FOYnDqdNnSX8oZkKzPh3OgMcVzWV5AqTVlly1iDy.jpg', 'description' => 'Draudzes informācija.',]);

        OldImages::create(['monument_id' => $m->id, 'path' => 'images/2/historical/a8mkptyT1CuIh3j6kle2lIGMjx9ksanbIKjzQ1pJ.png', 'description' => 'Koncerta programma',]);

        OldImages::create(['monument_id' => $m->id, 'path' => 'images/2/historical/Lg3mKIh8jPIm9KioXbZWmPjYo3hqFieAG4FZNxpQ.png', 'description' => 'Ģertrūdes iela un baznīca. 20.gs.vidus. autors nezināms',]);

        Document::create(['monument_id' => $m->id, 'path' => 'images/2/documents/32h5ENqROsSmj47zQJQ4wY49NPwOt99l7ynK5ODq.png', 'description' => 'Publikācija laikrakstā Laikmets 1944.g.Nr. 11',]);

        $m = Monument::create(['title' => 'Pirmajā pasaules karā kritušo kapi Ķemeros', 'state' => 'Jūrmala', 'location' => 'Ķemeri, Andreja Upīša iela 18, pie luterāņu baznīcas', 'people' => 'Laube Eižens', 'cover' => 'new']);
        Description::create(['content' => 'Pirmā pasaules kara fronte sasniedza Jūrmalu jau 1915.gada vasarā. Sloka un Ķemeri kļuva par piefrontes apgabaliem. Kaujās kritušos apbedīja brāļu kapos pie Ķemeru luterāņu baznīcas.', 'monument_id' => $m->id,]);
        PlaceDescription::create(['content' => 'Brāļu kapi ierīkoti baznīcas tiešā tuvumā, dienvidu pusē. 1924.gada 14.septembrī šeit atklāja betonā lietu, piramīdveida pieminekli, kurā iegravēts teksts, kas vēstī, ka apbedīti 2.Rīgas, 5.Zemgales, 6.Tukuma un 8.Valmieras pulka latviešu strēlnieki. Pieminekļa veidols ir arhitekta Eižena Laubes tipveida pieminekļa mets, kas kalpoja par paraugu vēl citiem karavīru kapiem Latvijā. Dažās vietās ar laiku tika uzslieti mākslinieciski izteiksmīgāki objekti. Kapulauks dabā nav iezīmēts.', 'monument_id' => $m->id,]);

        $m->types()->attach([7]);
        $m->intervals()->attach([2]);
        NewImages::create(['monument_id' => $m->id, 'path' => 'images/3/recent/SoVikr4G2cr7kcJfEIDLwiYIQhQ8MIQHE2010Ma1.jpg', 'description' => 'Pieminekļa ziemeļu puse, pret baznīcu. Attēls 2015, R.Pētersons',]);

        NewImages::create(['monument_id' => $m->id, 'path' => 'images/3/recent/nWwnjG7it0VhA5rLdNXhNZOJ17h4vgvJluyCqH3M.jpg', 'description' => 'Pieminekļa dienvidu puse. Attēls 2015, R.Pētersons',]);

        NewImages::create(['monument_id' => $m->id, 'path' => 'images/3/recent/HK8vs9oAXEafQLf8f3j3rcxcYTPEoV8W8QlZajCx.jpg', 'description' => 'Dievnama centrālā fasāde pret Andreja Upīša ielu. Karavīru kapi pa kreisi. Foro 2015, R.Pētersons',]);

        OldImages::create(['monument_id' => $m->id, 'path' => 'images/3/historical/jRrHvLDDkCJMbN1dnHtl7dlK8eOCcue5YRuhoFdE.jpg', 'description' => 'Goda sardze pie pieminekļa. 1920.tie gadi. Reprodukcija no preses izdevuma. Autors nav zināms.',]);

        $m = Monument::create(['title' => 'Kapa vieta robežsargam Jānim Macītim (1913-1940)', 'state' => 'Novadnieku pagasts', 'location' => 'Elku (arī Sātiņu) kapsēta, Saldus novads', 'people' => 'Macītis Jānis, Feldmanis Andrejs', 'cover' => 'new']);
        Description::create(['content' => '1940.gada 15.jūnija rītā uz austrumu robežas ar PSRS risinājās t.s. Masļenku traģēdija, kad diviem Latvijas robežpunktiem uzbruka padomju puses militārpersonas. Masļenku robežpunktā uzbrucējiem tika izrādīta bruņota pretestība, kuras rezultātā tika nogalināti vairāki robežsargi, tostarp Jānis Macītis. Viņu apbedīja 18.jūnijā.', 'monument_id' => $m->id,]);
        PlaceDescription::create(['content' => 'Apbedījuma vietā 2020.gada 23.augustā svinīgā pasākumā tika atklāts piemiņas akmens. Atklāšanā piedalījās Okupācijas muzeja pārstāvji, kā arī grāmatas par Masļenku traģēdiju autors Andrejs Edvīns Feldmanis. Uzraksts uz piemiņas akmens: "Šeit dus robežsargs Jānis Macītis (1913.11.VI-1940.15.VI) kritis Masļenku robežpārejas punktā Padomju Savienības armijai šķērsojot neatkarīgās Latvijas valsts robežu.', 'monument_id' => $m->id,]);

        $m->types()->attach([7]);
        $m->intervals()->attach([5]);
        NewImages::create(['monument_id' => $m->id, 'path' => 'images/4/recent/19W8OiuYqoPHDt7pWjcsYp1X8BckpmLYdXdhr1H5.jpg', 'description' => 'Kopskats uz dzimtas apbedījumiem. 2020. Foto R.Pētersons',]);

        NewImages::create(['monument_id' => $m->id, 'path' => 'images/4/recent/XFakBIeFom6wgoh9q8O6Nk6ZSdefJ8jGKKE7T4xk.jpg', 'description' => 'Piemiņas akmens tuvplānā. 2020. Foto R.Pētersons',]);

        NewImages::create(['monument_id' => $m->id, 'path' => 'images/4/recent/CpRNfboST79wPnTRHTaBxMpauQwgs1xULTIkUcVV.jpg', 'description' => 'Piemiņas pasākuma dalībnieki. 2020. Foto R.Pētersons',]);

        NewImages::create(['monument_id' => $m->id, 'path' => 'images/4/recent/N97KZaPUGbnhsXRPZsMlYe7qpRA9JtEHEXwsWDqr.jpg', 'description' => 'Kapsētas vārti. 2020. Foto R.Pētersons',]);

        NewImages::create(['monument_id' => $m->id, 'path' => 'images/4/recent/lXdQBVmNil5vEXySXdJETWKoNdnrRtBJzCaeJ1V9.jpg', 'description' => 'Ielūgums uz piemiņas pasākumu. 2020.',]);

        NewImages::create(['monument_id' => $m->id, 'path' => 'images/4/recent/CG1f49swd2Hhrxxp758uyFx1aBklC5MvvE8U3nQF.jpg', 'description' => 'Pasākuma programma. 2020',]);

        NewImages::create(['monument_id' => $m->id, 'path' => 'images/4/recent/cQXRsWwzJjP7gSfaJhhwOd3iDymFSJK01aoybll4.jpg', 'description' => 'Svinīgs piemiņas pasākuma brīdis. 2020. Foto R.Pētersons',]);

        NewImages::create(['monument_id' => $m->id, 'path' => 'images/4/recent/Y2RUl6yZhbAcTmx1wDa3I0djak3K4ZDbvUVbtORG.jpg', 'description' => 'A.E.Feldmanis pasākumā. 2020. Foto R.Pētersons',]);

        OldImages::create(['monument_id' => $m->id, 'path' => 'images/4/historical/suzjHMNu4OdNzlOnTaiWTmE72jAc6Z81zMyNEaIi.png', 'description' => 'Skenēts 202.lpp. fragments no A.E.Feldmaņa grāmatas',]);

        OldImages::create(['monument_id' => $m->id, 'path' => 'images/4/historical/6hjXqmfPco1V9klTk0V6Qc0oooiQNWRrtvFSlLVO.png', 'description' => 'A.E.Feldmaņa grāmatas vāka attēls.',]);

        $m = Monument::create(['title' => 'Ģenerāļa Ludviga Bolšteina (1888-1940) vasaras mītne', 'state' => 'Matkules pagasts', 'location' => 'Pūces dzirnavas', 'people' => 'Bolšteins Ludvigs, Bolšteins Emīls, Vismanis Emīls Edgars, Štreičs Jānis', 'cover' => 'new']);
        Description::create(['content' => 'Robežsargu brigādes vadītājs, ģenerālis Ludvigs Bolšteins vasaras pavadīja nelielā koka mājiņā brāļa Emīla Bolšteina (1889-1970, ASV) dzirnavās. Ludvigs Bolšteins 1940.gada 21.jūnijā izdarīja pašnāvību savā darba kabinetā Rīgā, "Stūra mājā" Brīvības ielā 61.', 'monument_id' => $m->id,]);
        PlaceDescription::create(['content' => 'Uz Imulas upes celtajās dzirnavās, kas tiek izmantotas kā dzīvojamās ēkas, upes gravā, apmēram 100 m no dzirnavu pagalma ir neliela koka ēciņa, kurā ir ierīkota piemiņas istaba Ludvigam Bolšteinam. To 1990.tajos gados ar Latvijas robežsargu atbalstu izveidoja dzirnavu saimnieks Emīls Edgars Vismanis (1933-2022). Vairāk kā 20 gadu garumā jūnija mēnesī Latvijas Robežsardze šeit rīko piemiņas pasākumus. Pūces dzirnavas Latvijas kultūras vēsturē pazīstamas kā vieta, kur tika uzņemta mākslas filma "Likteņdzirnas" (1997, režisors Jānis Streičs)', 'monument_id' => $m->id,]);

        $m->types()->attach([8]);
        $m->intervals()->attach([4, 5]);
        NewImages::create(['monument_id' => $m->id, 'path' => 'images/5/recent/cZ3B4Hbx1vSpN3dmppBaW9PKqQfEyjfbfmCTzszC.jpg', 'description' => 'Vasaras māja. Ārskats. 2020. R.Pētersons',]);

        NewImages::create(['monument_id' => $m->id, 'path' => 'images/5/recent/9Fx2xKowHzXe4NDyfblctCmGuTBLks9xrFIvCAzB.jpg', 'description' => 'Dzirnavu dzīvojamā ēka. 2020. R.Pētersons',]);

        NewImages::create(['monument_id' => $m->id, 'path' => 'images/5/recent/SIjbV1WKgu65p8OoqOY4IxE485Uq5Ar8TiSHLmyW.jpg', 'description' => 'Dekors uz dzīvojamās ēkas zelmiņa. 2020. R.Pētersons',]);

        NewImages::create(['monument_id' => $m->id, 'path' => 'images/5/recent/HizZtzfCkTexkUf30YBa0LJUWUBHA8HQ0gYNGK6x.jpg', 'description' => 'Vasaras māja upes gravā. 2020.R.Pētersons',]);

        NewImages::create(['monument_id' => $m->id, 'path' => 'images/5/recent/M9GAtiDHeoAeflWC3iJziMgLjqGykDZ7ytWEsXBe.jpg', 'description' => 'Ekspozīcijas teksts par piemiņas vietas tapšanu. 2020. R.Pētersons',]);

        NewImages::create(['monument_id' => $m->id, 'path' => 'images/5/recent/DDzqfFiP0qSsbxHx7rebP9RjfIqIlkWr1r8nDjxh.jpg', 'description' => 'Ekspozīcijas fragments. 2020. R.Pētersons',]);

        NewImages::create(['monument_id' => $m->id, 'path' => 'images/5/recent/N4yHWmFgnpWq9eauTXIjQXh3ny6JtL6GMYDVhjvx.jpg', 'description' => 'Emīls Edgars Vismanis. Ekspozīcijas sargs un dzirnavu saimnieks. 2020. R.Pētersons',]);

        $m = Monument::create(['title' => 'Komunistiskā un nacistiskā terora upuru piemiņas vieta Aizkrauklē', 'state' => 'Aizkraukles pagasts', 'location' => 'Kalna iela 20', 'people' => 'nav', 'cover' => 'new']);
        Description::create(['content' => 'Okupācijas varu piemiņai', 'monument_id' => $m->id,]);
        PlaceDescription::create(['content' => 'Laukakmenī iecirsti vārdi "Tiem, kas nepārnāca. Staļina - Hitlera genocīda upuriem". Atklāts 1989.gadā un atrodas pie ēkas, kurā šobrīd ierīkota Aizkraukles vēstures un mākslas muzeja ekspozīcija "Padomju gadi"', 'monument_id' => $m->id,]);

        $m->types()->attach([1]);
        $m->intervals()->attach([5, 6]);
        NewImages::create(['monument_id' => $m->id, 'path' => 'images/7/recent/f9mm3BdNn8ClIFGGkfDbwX8QLs9Ka2c43JILxO7Z.jpg', 'description' => 'Piemiņas akmens. 2019. R.Pētersons',]);

        NewImages::create(['monument_id' => $m->id, 'path' => 'images/7/recent/lw77cZSZu2GBZEQxTaroOkQ1iMcigTXuWLBVFPgZ.jpg', 'description' => 'Piemiņas vietas kopskats. 2019. R.Pētersons',]);

        NewImages::create(['monument_id' => $m->id, 'path' => 'images/7/recent/cErAJ6wJwOyk3lzZrQCa3oRjUlva3MIJRCtEzlpv.jpg', 'description' => 'Reklāmas teksts uz ēkas fasādes. 2019. R.Pētersons',]);

        NewImages::create(['monument_id' => $m->id, 'path' => 'images/7/recent/VcCD0q6ULJekTKBFf4eOJ4CzZd67imKlvrp7IIjV.png', 'description' => 'Vieta no kadastra kartes',]);

        NewImages::create(['monument_id' => $m->id, 'path' => 'images/7/recent/TDjfHKarGstclBW5O3wvemZJ19T4q5p0jL1OfDkq.png', 'description' => 'Vieta no ceļu kartes',]);

        $m = Monument::create(['title' => 'Otrā pasaules karā kritušo sarkanarmiešu kapi Vietalvā', 'state' => 'Vietalvas novads', 'location' => 'Vesetas upes tuvumā, 1,6 km no Vietalvas luterāņu baznīcas, lielceļa malā', 'people' => 'Šēnbergs Edgars, Zvāra Zenta, Albergs Valdis', 'cover' => 'new']);
        Description::create(['content' => 'Vietalvas - Ērgļu kaujas 1944.gada augustā, t.s. Madonas operācijas ietvaros', 'monument_id' => $m->id,]);
        PlaceDescription::create(['content' => 'Sarkanarmiešu kapos 1968.gadā tika atklāts mākslinieciski augstvērtīgs piemiņas ansamblis. Tā simbolisko slodzi veido Lāčplēša cīņa ar Melno bruņinieku. Augsta kurgāna galā ir minēto tēlu kapara kalums, ko vainago smaile ar tajā iekārtiem zvaniem. Piemiņas vietas arhitekts ir Edgars Šēnbergs (1923-2016), tēlnieki Zenta Zvāra (1924-2001) un Valdis Albergs (1922-1984). Kapulaukā guldīti vairāk kā 500 karavīri. Lielākā daļa zināmi.', 'monument_id' => $m->id,]);

        $m->types()->attach([7]);
        $m->intervals()->attach([6]);
        NewImages::create(['monument_id' => $m->id, 'path' => 'images/8/recent/hzAL6qgv8zJXQ6XO0aP0tT9Ovc7VBgerzHo6iUTd.jpg', 'description' => 'Kopskats uz kurgānu. 2019. R.Pētersons',]);

        NewImages::create(['monument_id' => $m->id, 'path' => 'images/8/recent/B5nG3uiVCAUeefYV77Y5GU7JAr8EqxgJE2ZQVBRT.jpg', 'description' => 'Piemiņas zīme pirms ieejas ansamblī. 2019. R.Pētersons',]);

        NewImages::create(['monument_id' => $m->id, 'path' => 'images/8/recent/gBl67SI8y3uBycWKHBxPGgsBQ2T0Pe3Dq3v4u3xj.jpg', 'description' => 'Kapulauks. 2019. R.Pētersons',]);

        NewImages::create(['monument_id' => $m->id, 'path' => 'images/8/recent/VEnCb2PD5MFscUoW09vW0dbAUrm6udNcFRYXMzXM.jpg', 'description' => 'Sānskats uz kurgānu. 2019.R.Pētersons',]);

        NewImages::create(['monument_id' => $m->id, 'path' => 'images/8/recent/FoqRHFWwOYGzT3VGFy8vM3KmCsitdo0sVflotRDr.jpg', 'description' => 'Kapulauks. Skats no kurgāna. 2019. R.Pētersons',]);

        NewImages::create(['monument_id' => $m->id, 'path' => 'images/8/recent/I8IFTTzSCwpWslshY19fF1FwBOBYkayZuWHMnrJ4.jpg', 'description' => 'Skulpturālās grupas tuvplāns. 2019. R.Pētersons',]);

        NewImages::create(['monument_id' => $m->id, 'path' => 'images/8/recent/OEDvSmtdffeQ56MgzTNibxrXrWxZQiu84VwI90Rf.jpg', 'description' => 'Karavīru apbedījumi. Fragments. 2019. R.Pētersons',]);
    }
}
