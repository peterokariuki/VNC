document.addEventListener('DOMContentLoaded', loadArticles);
const leftarticleblogs = document.querySelector(".left-article-blogs");
const foryou = document.getElementById("foryou");
const popular = document.getElementById("popular");
const latest = document.getElementById("latest");
const articlebtns = document.querySelectorAll('.articlebtns');


function fetchCall(resource, callBack, method='GET'){
    const url = "logic/"
    fetch(url + resource, {
        method: method,
    })
    .then(res => res.json())
    .then(data =>{
        callBack(data);
    })
    .catch((err)=>console.log(err));
}

function loadArticles(){
    fetchCall('blogs.inc.php', responseArticle);
    function responseArticle(data){
        const blogs = data.blogs;
        const articles = blogs.slice(0,6);
        populateArticle(articles);
    }
}

function populateArticle(articles){
    leftarticleblogs.innerHTML = ``;
    articles.forEach(article => {
        const mysqlDate = article.date;
        const javascriptDate = new Date(mysqlDate).toLocaleDateString(
            'en-UK', {
                year: 'numeric',
                month: 'short',
                day: 'numeric'
            }
        )
        fetchCall(`blogauthor.inc.php?author=${article.author_id}`, responseAuthor);
        function responseAuthor(data){
            const author = data.author[0];
            const articleDiv = document.createElement('div');
            articleDiv.className = "left-blogs-div";
            articleDiv.innerHTML = `
                <div class="blogs-div-content">
                <div class="blogs-div-author">
                    <div class="blogs-author-image">
                        <img src="${author.image}" alt="${author.blog_name}">
                    </div>
                    <div class="blogs-author-details">
                        <div class="blogs-author-name">
                            <h5>${author.name}</h5>
                            <p>${javascriptDate}</p>
                        </div>
                        <h6>${author.role}</h6>
                    </div>
                </div>
                <div class="blogs-div-details">
                    <div class="blogs-details-title" data-id="${article.blog_id}" data-name="${article.blog_name}" onclick="openBlog(this)">${article.small_title}</div>
                    <div class="blogs-details-content">
                        ${article.small_paragraph}
                    </div>
                </div>
                <div class="blogs-div-read">
                    <div class="btn-readmore" data-id="${article.blog_id}" data-name="${article.blog_name}" onclick="openBlog(this)">Read More</div>
                    <div class="btn-readlike-white">${article.read_time} min read</div>
                </div>
                </div>
                <div class="blogs-div-image">
                    <img src="${article.blog_image}" alt="${article.blog_name}">
                </div>
            `;
            leftarticleblogs.append(articleDiv);
        }
    })
}

function articleBtn(actualbtn){
    articlebtns.forEach(btn => {
        if(btn.classList.contains('article-active')){
            btn.classList.remove('article-active');
            btn.classList.add('article-inactive');
        }
    })
    actualbtn.classList.remove('article-inactive');
    actualbtn.classList.add('article-active');
}


popular.addEventListener('click', ()=>{
    articleBtn(popular)
    fetchCall(`article.inc.php?type=popular`, respondPopular);
    function respondPopular(data){
        const blogs = data.blogs;
        const slcBlogs = blogs.slice(0, 6);
        populateArticle(slcBlogs);
    }
});

foryou.addEventListener('click', ()=>{
    articleBtn(foryou)
    fetchCall(`article.inc.php?type=foryou`, respondForyou);
    function respondForyou(data){
        const blogs = data.blogs;
        const slcBlogs = blogs.slice(0, 6);
        populateArticle(slcBlogs);
    }
});

latest.addEventListener('click', ()=>{
    articleBtn(latest)
    fetchCall(`article.inc.php?type=latest`, respondLatest);
    function respondLatest(data){
        const blogs = data.blogs;
        const slcBlogs = blogs.slice(0, 6);
        populateArticle(slcBlogs);
    }
});