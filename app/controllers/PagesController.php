<?php
class PagesController extends BaseController
{
    protected $allowsExt = array('.twig', '.php', '.html');

    /**
     * Busca a pagina solcitada atraq
     * @param string $page
     */
    public function getPage($page)
    {
    	$notFound = true;
        $page  = 'pages/' . trim($page, '/');

        foreach ($this->allowsExt as $ext):
        	$view     = $page . $ext;
        	$filename = rtrim($this->app['twig.path']) . '/pages/' . $view;
        	if (file_exists($filename) and is_file($filename))
            {
        		$notFound = false;
                break;
        	}
        endforeach;

        if ($notFound) {
            $this->abort(404, "Page Not Found - {$page}");
        }
        
        return $this->twig($view);
    }
}