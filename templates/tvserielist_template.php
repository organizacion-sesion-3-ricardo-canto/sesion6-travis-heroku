{ "collection" :
    {
        "title" : "Tvserie Database",
            "type" : "Tvserie",
            "version" : "1.0",
            "href" : "{{ path_for('series')}}",

            "links" : [
                {"rel" : "profile" , "href" : "http://schema.org/Tvseries","prompt":"Perfil"},
                {"rel" : "collection", "href" : "{{ path_for('movies') }}","prompt":"Movies"},
                {"rel" : "collection", "href" : "{{ path_for('books') }}","prompt":"Books"},
                {"rel" : "collection", "href" : "{{ path_for('musicalbums') }}","prompt":"Music Albums"},
                {"rel" : "collection", "href" : "{{ path_for('games') }}","prompt":"Videojuegos"}
            ],
      
            "items" : [
                {% for item in items %}
	  
                {
                    "href" : "{{ path_for('series') }}/{{ item.id }}",
                        "data" : [
                            {"name" : "name", "value" : "{{ item.name }}", "prompt" : "Nombre de la Serie"}
                        ]
                        } {% if not loop.last %},{% endif %}
	  
                {% endfor %}
	  
            ],
      
            "template" : {
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
    } 
}




