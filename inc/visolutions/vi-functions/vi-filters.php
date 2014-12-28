<?php
/* Recebe a imagem enviada pelo admin , e retorna apenas po SRC 
	By Rafael Caparroz Zuim*/
add_filter("img_serialize","getImgSrc");
function getImgSrc($img){
	$doc = new DOMDocument();
    $doc->loadHTML($img);
    $imageTags = $doc->getElementsByTagName('img');
    $src = array();

    foreach($imageTags as $tag) {
        $src[]=$tag->getAttribute('src');
    }
    if(sizeof($src)>1)
    {
    	return $src;
    }
    else
    {
		return $src[0];
	}
}

// este é o hook da paginação dos members
add_filter("bp_get_members_pagination_links","mp_the_pagination");
add_filter("bp_get_groups_pagination_links","mp_the_pagination");


/*  recebe a paginação padrão do wordpress , desmonta a string e monta um objeto dom
    com as características,atributos e etc desejadas... 
    By Rafael Caparroz Zuim
*/

function mp_the_pagination($args){
    echo mp_get_pagination($args);
}
    function mp_get_pagination($str){

        if($str==""){
            return "";
        }
        // instancia um objeto da classe DOM
        $dom = new DOMDocument();
        // Carrega o html enviado
        $dom->loadHTML($str);

        // pegando todas as tags A
        $tags = $dom->getElementsByTagName("a");

        // pegando a tag span (Página atual)
        $spn = $dom->getElementsByTagName("span");

        // encontrando o numero da pagina atual
        foreach($spn as $tag) {
            if(strstr($tag->getAttribute('class'),"current"))
            {
                $atual = (int) DOMinnerHTML($tag);
            }
        }

        // array onde será montado todos os links
        $links= array();
        

        // loop para montar um array com as tags a
        foreach($tags as $tag) {
            // é a tag PREVIOUS ?
            if(strstr($tag->getAttribute('class'),"prev")){
                $prev = array("link"        =>$tag->getAttribute('href'),
                              "className"   =>"previous");
            }
            // é a tag NEXT ?
            elseif(strstr($tag->getAttribute('class'),"next"))
            {
                $next = array("link"        =>$tag->getAttribute('href'),
                              "className"   =>"next");
            }
            // então é um link normal ( 1, 2, 3 .... 5, 6, 7)
            else{
                $links[(int) DOMinnerHTML($tag)]["link"] =  $tag->getAttribute('href');
                $links[(int) DOMinnerHTML($tag)]["className"]  =  $tag->getAttribute('class');
            }            
        }

        // adicionando a pagina atual ao array que será iterado
        $links[$atual]=array(   "link"       => "javascript",
                                "className" => "active");
                        
        // ordenando o array pelos seus índices , parar deixa na ordem correta de montagem
        ksort($links);

        $obj =new DOMDocument();

        // criando totalmente com DOM do PHP o html que será retornado
        $wrapper = $obj->createElement("div");        
        // setando a class
        $wrapper->setAttribute("class","wrapper");
        // adicionando o elemento ao objeto dom
        $obj->appendChild($wrapper);
                
        // se ja passamos da primeira página , imprime o link PREVIOUS
        if(isset($prev))
        {
            $a = $obj->createElement("a");
            $a->setAttribute("href",$prev["link"]);
            $a->setAttribute("class",$prev["className"]);
            $a->insertBefore($obj->createTextNode(__("Anterior","muscleprime")));
            $wrapper->appendChild($a);
        }
        
        //loop para montar as tags a
        for($y=1;$y<=sizeof($links);$y++)
        {
            // crio o elemento a
            $a = $obj->createElement("a");      

            // verifica se o ponteiro se encontra no registro que corresponde a página atual
            if($links[$y]["pageNumber"] == $atual)
            {
                // atribuindo as classes
                $a->setAttribute("class","active");
                $a->setAttribute("href","javascript:;");
                // adicionando o conteudo dentro da tag a (innerHTML)
                $a->insertBefore($obj->createTextNode($y));
            }
            else
            {
                // atribuindo as classes
                $a->setAttribute("href",$links[$y]["link"]);
                $a->setAttribute("class",$links[$y]["className"]);

                // adicionando o conteudo dentro da tag a (innerHTML)
                $a->insertBefore($obj->createTextNode($y));                                     
            }
            $wrapper->appendChild($a);

        }
        
        // se ainda não estamos na ultima pagina , imprime o botão Next
        if(isset($next))
        {
            $a = $obj->createElement("a");
            $a->setAttribute("href",$next["link"]);
            $a->setAttribute("class",$next["className"]);
            $a->insertBefore($obj->createTextNode(__("Próximo","muscleprime")));
            $wrapper->appendChild($a);
        }

        // retorna o método que imprime o html
        return $obj->saveHTML();
    }


    // este método não existe na classe Nativa
    // Serve para obter apenas o conteúdo de dentro da tag <tag>Conteudo retornado</tag>
    function DOMinnerHTML(DOMNode $element) 
    {
        $innerHTML = "";         
        $children  = $element->childNodes;
        foreach ($children as $child) 
        { 
            $innerHTML .= $element->ownerDocument->saveHTML($child);
        }        
        return $innerHTML;
    }





