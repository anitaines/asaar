<?php

namespace App\Http\Controllers;

use App\Release;

use Illuminate\Http\Request;

use Carbon\Carbon;


class SiteMap
{
    const START_TAG = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
    const END_TAG = '</urlset>';

    // to build the XML content
    private $content;

    public function add(Url $siteMapUrl)
    {
        $this->content .= $siteMapUrl->build();
    }

    public function build()
    {
        return self::START_TAG . $this->content . self::END_TAG;
    }
}




class Url
{
    private $url;
    private $lastUpdate;
    private $frequency;
    private $priority;

    public static function create($url)
    {
        $newNode = new self();
        $newNode->url = url($url);
        return $newNode;
    }

    public function lastUpdate($lastUpdate)
    {
        $this->lastUpdate = $lastUpdate;
        return $this;
    }

    public function frequency($frequency)
    {
        $this->frequency = $frequency;
        return $this;
    }

    public function priority($priority)
    {
        $this->priority = $priority;
        return $this;
    }

    public function build()
    {
        // $url = 'http://asperger.org.ar/';
        // $lastUpdate = '2020-07-31T01:06:39+00:00';
        // $frequency = 'monthly';
        // $priority = '1.00';
        return "<url>" .
            "<loc>$this->url</loc>" .
            "<lastmod>$this->lastUpdate</lastmod>" .
            "<changefreq>$this->frequency</changefreq>" .
            "<priority>$this->priority</priority>" .
        "</url>";
    }
}




class SiteMapController extends Controller
{
    private $siteMap;

    public function index()
    {
        $this->siteMap = new SiteMap();

        $this->addUniqueRoutes();

        return response($this->siteMap->build(), 200)
            ->header('Content-Type', 'text/xml');
    }

    private function addUniqueRoutes()
    {
      $startOfMonth = Carbon::now()->startOfMonth()->format('c');

      $this->siteMap->add(
          Url::create('/')
              ->lastUpdate($startOfMonth)
              ->frequency('monthly')
              ->priority('1.00')
      );

      $this->siteMap->add(
          Url::create('/asperger-cea')
              ->lastUpdate($startOfMonth)
              ->frequency('monthly')
              ->priority('0.9')
      );

      $this->siteMap->add(
          Url::create('/quienes-somos')
              ->lastUpdate($startOfMonth)
              ->frequency('monthly')
              ->priority('0.8')
      );

      $this->siteMap->add(
          Url::create('/actividades')
              ->lastUpdate($startOfMonth)
              ->frequency('monthly')
              ->priority('0.7')
      );

      $this->siteMap->add(
          Url::create('/contacto')
              ->lastUpdate($startOfMonth)
              ->frequency('monthly')
              ->priority('0.5')
      );

      $this->siteMap->add(
          Url::create('/asociarse')
              ->lastUpdate($startOfMonth)
              ->frequency('monthly')
              ->priority('0.5')
      );

      $this->siteMap->add(
          Url::create('/donar')
              ->lastUpdate($startOfMonth)
              ->frequency('monthly')
              ->priority('0.6')
      );

      $ultimaNoticia = Release::latest()->first()->updated_at;
      $updateDateUltimaNoticia = $ultimaNoticia->format('c');
      $this->siteMap->add(
          Url::create('/noticias')
              ->lastUpdate($updateDateUltimaNoticia)
              ->frequency('weekly')
              ->priority('0.8')
      );
    }
}
