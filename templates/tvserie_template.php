{ "collection" :
    {
        "title" : "Tvserie Database",
            "type" : "tvserie",
            "version" : "1.0",
            "href" : "{{ path_for('tvseries')}}",
      
            "links" : [
                {"rel" : "profile" , "href" : "http://schema.org/Tvserie","prompt":"Perfil"},
                {"rel" : "collection", "href" : "{{ path_for('movies') }}","prompt":"Movies"},
                {"rel" : "collection", "href" : "{{ path_for('books') }}","prompt":"Books"},
                {"rel" : "collection", "href" : "{{ path_for('musicalbums') }}","prompt":"Music Albums"},
                {"rel" : "collection", "href" : "{{ path_for('games') }}","prompt":"Videogames"}
            ],
      
            "items" : [
                {
                    "href" : "{{ path_for('tvseries') }}/{{ item.id }}",
                        "data" : [
                            {"name" : "name", "value" : "{{ item.name }}", "prompt" : "Nombre de la Serie"},
                            {"name" : "description", "value" : "{{ item.description }}", "prompt" : "Descripción de la Serie"},
                            {"name" : "TVPlatform", "value" : "{{ item.TVPlatform }}", "prompt" : "Canal de la Serie"},
                            {"name" : "applicationSubCategory", "value" : "{{ item.applicationSubCategory }}", "prompt" : "Categoria de la Serie"},
                            {"name" : "screenshot", "value" : "{{ item.screenshot }}", "prompt" : "URL of a captura de la serie"},
                            {"name" : "datePublished", "value" : "{{ item.datePublished }}", "prompt" : "Fecha de lanzamiento"},
                            {"name" : "embedUrl", "value" : "{{ item.embedUrl }}", "prompt" : "Trailer en Youtube"}
                        ]
                        } 
	  
            ],
      
            "template" : {
            "data" : [
                {"name" : "name", "value" : "", "prompt" : "Nombre de la Serie"},
                {"name" : "description", "value" : "", "prompt" : "Descripción de la Serie"},
                {"name" : "TVPlatform", "value" : "", "prompt" : "Plataforma de la Serie"},
                {"name" : "applicationSubCategory", "value" : "", "prompt" : "Categoria de la Serie"},
                {"name" : "screenshot", "value" : "", "prompt" : "URL of a captura de la serie"},
                {"name" : "datePublished", "value" : "", "prompt" : "Fecha de lanzamiento"},
                {"name" : "embedUrl", "value" : "", "prompt" : "Trailer en Youtube"}
            ]
                }
    } 
}




