document.addEventListener('DOMContentLoaded', loadTrendingBlogs);
const righttrendingcontent = document.querySelector(".right-trending-content");
const trendingcontent = document.querySelector(".trending-content");

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

function loadTrendingBlogs(){
    fetchCall('blogs.inc.php', responseIndex);
    function responseIndex(data){
        const blogs = data.blogs;
        const right = blogs.slice(0, 2);
        const left = blogs.slice(2, 3)
        populateRight(right);
        populateLeft(left);
    }
}

function populateRight(blogs){
    blogs.forEach(blog => {
        const mysqlDate = blog.date;
        const javascriptDate = new Date(mysqlDate).toLocaleDateString(
            'en-UK', {
                year: 'numeric',
                month: 'short',
                day: 'numeric'
            }
        )
        fetchCall(`blogauthor.inc.php?author=${blog.author_id}`, responseAuthor);
        function responseAuthor(data){
            const author = data.author[0].name;
            const rightDiv = document.createElement('div');
            rightDiv.className = "right-trending-div";
            rightDiv.innerHTML = `
                <div class="trending-div-image">
                    <img src="${blog.blog_image}" alt="${blog.blog_name}">
                </div>
                <div class="trending-div-title" data-id="${blog.blog_id}" data-name="${blog.blog_name}" onclick="openBlog(this)">${blog.small_title}</div>
                <div class="trending-div-bottom">
                    <div class="trending-div-author">
                        <div class="div-author">${author}</div>
                        <div class="div-date">${javascriptDate}</div>
                        <div class="div-duration btn-readlike-white">${blog.read_time} min read</div>
                    </div>
                    <div class="trending-div-readmore btn-readmore" data-id="${blog.blog_id}" data-name="${blog.blog_name}" onclick="openBlog(this)">Read More</div>
                </div>
            `;

            righttrendingcontent.append(rightDiv);
        }
    })
}

function populateLeft(blogs){
    blogs.forEach(blog => {
        const mysqlDate = blog.date;
        const javascriptDate = new Date(mysqlDate).toLocaleDateString(
            'en-UK', {
                year: 'numeric',
                month: 'short',
                day: 'numeric'
            }
        )
        fetchCall(`blogauthor.inc.php?author=${blog.author_id}`, responseAuthor);
        function responseAuthor(data){
            const author = data.author[0];
            const leftDiv = document.createElement('div');
            leftDiv.className = "left-trending-content";
            leftDiv.innerHTML = `
                <div class="left-trending-image">
                    <img src="${blog.blog_image}" alt="${blog.blog_name}">
                </div>
                <div class="left-trending-category">
                    <div class="left-blog-category">${blog.blog_name}</div>
                    <div class="btn-readlike-white">${blog.read_time} min read</div>
                </div>
                <div class="left-trending-title" data-id="${blog.blog_id}" data-name="${blog.blog_name}" onclick="openBlog(this)">${blog.small_title}</div>
                <div class="left-trending-author">
                    <div class="left-like">${blog.likes} Likes</div>
                    <div class="left-author">
                        <div class="left-author-details">
                            <p>By ${author.name}</p>
                            <p>${javascriptDate}</p>
                        </div>
                        <div class="left-author-picture">
                            <img src="${author.image}" alt="${author.name}">
                        </div>
                    </div>
                </div>
            `;

            trendingcontent.prepend(leftDiv);
        }
    })
}