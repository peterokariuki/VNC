document.addEventListener('DOMContentLoaded', loadBlogs);
const blogspagecontainer = document.getElementById("blogspagecontainer");
const loadmoreblogs = document.getElementById("loadmoreblogs");

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

function loadBlogs(){
    fetchCall('blogs.inc.php', respondBlogs);
    function respondBlogs(data){
        const blogs = data.blogs;
        populateBlogs(blogs);
    }
}

function populateBlogs(blogs){
    blogs.forEach(blog => {
        fetchCall(`blogauthor.inc.php?author=${blog.author_id}`, respondAuthor);
        function respondAuthor(data){
            const author = data.author[0];

            const mysqlDate = blog.date;
            const javascriptDate = new Date(mysqlDate).toLocaleDateString(
                'en-UK',
                {
                    year: 'numeric',
                    month: 'short',
                    day: '2-digit'
                }
            )

            const blogDiv = document.createElement('div');
            blogDiv.className = "blogs-div";
            blogDiv.innerHTML = `
                <div class="blogs-image">
                    <img src="${blog.blog_image}" alt="${blog.blog_name}"></div>
                <div class="blogs-details">
                    <div class="blogs-details-title">
                        <h3 data-id="${blog.blog_id}" data-name="${blog.blog_name}" onclick="openBlog(this)">${blog.small_title}</h3>
                        <p>${javascriptDate}</p>
                    </div>
                    <div class="blogs-details-desc">
                        ${blog.small_paragraph}
                    </div>
                    <div class="blogs-details-author">
                        <div class="left-author-image">
                            <div class="author-image">
                                <img src="${author.image}" alt="${author.name}"></div>
                            <div class="author-name">${author.name}</div>
                        </div>
                        <div class="right-readtime btn-readlike-white">${blog.read_time} min read</div>
                    </div>
                    <div class="blogs-details-like">
                        <div class="btn-readlike-white">${blog.likes} Likes</div>
                        <div class="btn-readmore" data-id="${blog.blog_id}" data-name="${blog.blog_name}" onclick="openBlog(this)" >Read More</div>
                    </div>
                </div>
            `;

            blogspagecontainer.append(blogDiv);
        }
    })
}
