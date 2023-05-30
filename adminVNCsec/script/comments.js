document.addEventListener('DOMContentLoaded', loadComments);
const commentspagecontainer = document.getElementById("commentspagecontainer");
const commentsnumbertotal = document.getElementById("commentsnumbertotal");

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

function loadComments(){
    fetchCall('comments.inc.php', respondComments);
    function respondComments(data){
        const comments = data.comments;
        const num = data.num
        commentsnumbertotal.textContent = num;
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
            commentspagecontainer.append(commentDiv);
        }
    })
}
