document.addEventListener('DOMContentLoaded', loadDashComments);
document.addEventListener('DOMContentLoaded', loadSubs);
document.addEventListener('DOMContentLoaded', loadBlogs);
document.addEventListener('DOMContentLoaded', loadAllBlogs);
const dashboardcommentssec = document.getElementById("dashboardcommentssec");
const subscribernos = document.getElementById("subscribernos");
const blogsno = document.getElementById("blogsno");
const blogslikesno = document.getElementById("blogslikesno");
const blogsviewsno = document.getElementById("blogsviewsno");
const blogcontentcontent = document.querySelector(".blog-content-content");
const searchbtn = document.getElementById("searchbtn");
const searchinput = document.getElementById("searchinput");

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

function loadDashComments(){
    fetchCall('comments.inc.php', respondComments);
    function respondComments(data){
        const Allcomments = data.comments;
        const comments = Allcomments.slice(0,4);
        populateComments(comments);
    }
}

function populateComments(comments){
    comments.forEach(comment => {
        fetchCall(`blog.inc.php?id=${comment.blog_id}`, respondBlog)
        function respondBlog(data){
            const blogName = data.blog[0].blog_name;
            const mysqldate = comment.date;
            const javascriptdate = new Date(mysqldate).toLocaleDateString(
                'en-UK',
                {
                    year: 'numeric',
                    month: 'short',
                    day: 'numeric'
                }
            )

            const commentDiv = document.createElement('div');
            commentDiv.className = "comment-div";
            commentDiv.innerHTML = `
                <div class="name-blog-date">
                    <h4>${comment.username}</h4>
                    <h5>${blogName}</h5>
                    <h5>${javascriptdate}</h5>
                </div>
                <div class="comment">
                    <p>${comment.comment}</p>
                </div>
            `;
            dashboardcommentssec.append(commentDiv);
        }
    })
}

function loadSubs(){
    fetchCall('newsletter.inc.php', respondNewsletter);
    function respondNewsletter(data){
        const subs = parseInt(data.num);
        subscribernos.textContent = subs;
    }
}

function loadBlogs(){
    fetchCall('blogs.inc.php',respondBlogs);
    function respondBlogs(data){
        const blogs = data.blogs;
        const num = parseInt(data.num);
        blogsno.textContent = num;
        var likes = 0;
        var views = 0;
        blogs.forEach(blog => {
            const bloglikes = parseInt(blog.likes)
            likes = likes + bloglikes;
        })
        blogs.forEach(blog => {
            const blogviews = parseInt(blog.views)
            views = views + blogviews;
        })
        blogsviewsno.textContent = views;
        blogslikesno.textContent = likes;
    }
}

function loadAllBlogs(){
    fetchCall('blogs.inc.php', respondAll);
    function respondAll(data){
        const blogs = data.blogs;
        populateAllBlogs(blogs);
    }
}

function populateAllBlogs(blogs){
    blogcontentcontent.innerHTML = ``;
    blogs.forEach(blog => {
        fetchCall(`commentsno.inc.php?id=${blog.blog_id}`, respondAllComments);
        function respondAllComments(data){
            const coment = data.num;
            const mysqldate = blog.date;
            const javascriptaDate = new Date(mysqldate).toLocaleDateString(
                'en-UK',
                {
                    year: 'numeric',
                    month: 'short',
                    day: 'numeric'
                }
            )
            const blogADiv = document.createElement('div');
            blogADiv.className = "blog-div";
            blogADiv.innerHTML = `
                <div class="blog-id">${blog.blog_id}</div>
                <div class="blog-title">
                    <div class="blog-image">
                        <img src="../${blog.blog_image}" alt="${blog.blog_name}"></img>
                    </div>
                    <div class="blog-name">${blog.blog_name}</div>
                </div>
                <div class="blog-date">${javascriptaDate}</div>
                <div class="blog-comments">${coment}</div>
                <div class="blog-likes">${blog.likes}</div>
                <div class="blog-views">${blog.views}</div>
            `;
            blogcontentcontent.append(blogADiv);
        }
    })
}

searchbtn.addEventListener('click', ()=>{
    const value = searchinput.value;
    if(value != ''){
        fetchCall(`searchblog.inc.php?value=${value}`, respondSearch);
        function respondSearch(data){
            const blogs = data.blogs;
            populateAllBlogs(blogs);
        }
    }else{
        console.log('empty')
    }
})