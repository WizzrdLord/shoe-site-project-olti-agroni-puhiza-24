<form class="blog-form" method="POST" action="">
    <p>Shëno Titullin e Bllogut</p>
    <input class="blog-input" id="blogs_new_title" name="blog_title" placeholder="Titulli Shkon Këtu" required>
    
    <p>Shëno Bllogun</p>
    <textarea class="blog-textarea" id="blogs_new_content" name="blog_content" placeholder="Bllogu Shkon Këtu" required></textarea>
    
    <p>Shëno Ditën e Publikimit të Bllogut</p>
    <input class="blog-date" id="blogs_new_date" name="blog_creation_date" type="date" required>

    <button class="blog-button" type="submit" id="submit">Shto Artikullin</button>

    <input class="blog-input" list="delArticle" placeholder="Zgjidh artikullin per ta fshire">

    <button class="blog-button" type="submit" id="submit">Fshij Artikullin</button>

    <style>
        .blog-form{
            padding:20px;
            border-color: gray;
            border-radius: 10px;
            background-color: lightsalmon;
            margin-top: 50px;
            margin-left: 50px;
            align-items: center;
        }
        .blog-input{
            border-color: black;
            border-radius: 2px;
            height: 20px;
        }
        .blog-textarea{
            border-color: black;
            border-radius: 2px;
            padding: 10px;
            height: 400px;
            width: 200px;
        }
        .blog-button{
            border-radius: 2px;
            padding: 10px;
            background-color: gray;
            color:white;
            padding: 10px;
        }
        .blog-date{
            padding: 10px;
        }
    </style>
</form>
