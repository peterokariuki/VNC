document.addEventListener("DOMContentLoaded", loadBlog);
document.addEventListener("DOMContentLoaded", loadComments);

const blogdateposted = document.getElementById("blogdateposted");
const authornameblog = document.getElementById("authornameblog");
const authorroleblog = document.getElementById("authorroleblog");
const bigblogtitle = document.getElementById("bigblogtitle");
const bloglikescount = document.getElementById("bloglikescount");
const authorblogimaged = document.getElementById("authorblogimaged");
const blogcontentcontainer = document.getElementById("blogcontentcontainer");
const blogpathname = document.getElementById("blogpathname");
const loadmorecomments = document.getElementById("loadmorecomments");
const userlikebuttonblog = document.getElementById("userlikebuttonblog");
const commentsnumberblog = document.getElementById("commentsnumberblog");
const addcommentbtn = document.getElementById("addcommentbtn");
const commentadd = document.getElementById("commentadd");
const nameadd = document.getElementById("nameadd");
const errordivcomment = document.getElementById("errordivcomment");
const actualcommentscontainer = document.getElementById(
  "actualcommentscontainer"
);
const numbercommentslike = document.getElementById("numbercommentslike");
const emptycommentssection = document.getElementById("emptycommentssection");

function fetchCall(resource, callBack, method = "GET") {
  const url = "logic/";
  fetch(url + resource, {
    method: method,
  })
    .then((res) => res.json())
    .then((data) => {
      callBack(data);
    })
    .catch((err) => console.log(err));
}

const blogUrl = window.location.search;
const urlParams = new URLSearchParams(blogUrl);
const blogId = urlParams.get("sv");

function loadBlog() {
  fetchCall(`blog.inc.php?blogid=${blogId}`, responseBlog);
  function responseBlog(data) {
    const blog = data.blog[0];
    fetchCall(`blogauthor.inc.php?author=${blog.author_id}`, responseAuthor);
    function responseAuthor(data) {
      const author = data.author[0];
      for (i = 0; i < 19; i++) {
        var title = "section_title" + i;
        var section = "section_paragraph" + i;

        if (blog[title] != null) {
          const blogDiv = document.createElement("div");
          blogDiv.className = "blogs-divs";
          blogDiv.innerHTML = `
                        <div class="blog-paragraph-title">${blog[title]}</div>
                        <div class="blog-paragraph">
                            <p>${blog[section]}</p>
                        </div>
                    `;

          blogcontentcontainer.append(blogDiv);
        }
      }
      const mysqlDate = blog.date;
      const javascriptDate = new Date(mysqlDate).toLocaleDateString("en-UK", {
        year: "numeric",
        month: "short",
        day: "numeric",
      });
      userlikebuttonblog.setAttribute("data-id", blog.blog_id);
      blogdateposted.textContent = "Posted on " + javascriptDate;
      authornameblog.textContent = author.name;
      authorroleblog.textContent = author.role;
      bigblogtitle.textContent = blog.big_title;
      bloglikescount.textContent = blog.likes;
      blogpathname.textContent = blog.blog_name;
      document.title = blog.blog_name;
      authorblogimaged.innerHTML = `
                <img src="${author.image}" alt="${author.name}">
            `;
    }
  }
}

userlikebuttonblog.addEventListener("click", () => {
  const blogid = userlikebuttonblog.dataset.id;

  fetchCall(`like.inc.php?blogid=${blogid}`, responseLikes);
  function responseLikes(data) {
    if (data.msg == "success") {
      fetchCall(`loadlikes.inc.php?bid=${blogId}`, responseBlogLikes);
      function responseBlogLikes(data) {
        const likes = data.likes;
        userlikebuttonblog.innerHTML = `<span id="bloglikescount">${likes}</span> <i class="fa-regular fa-thumbs-up"></i> Likes`;
        userlikebuttonblog.disabled = true;
      }
    }
  }
});

addcommentbtn.addEventListener("click", () => {
  const comment = commentadd.value;
  const name = nameadd.value;
  if (comment == "" || name == "") {
    errordivcomment.textContent = "Please fill in all fields";
    errordivcomment.style.display = "block";
  } else {
    fetchCall(
      `comments.inc.php?blogid=${blogId}&comment=${comment}&name=${name}`,
      respondPostComment
    );
    function respondPostComment(data) {
      if (data.msg == "success") {
        window.location.reload();
      } else {
        errordivcomment.textContent = "Something went wrong, Please try again!";
        errordivcomment.style.display = "block";
      }
    }
  }
});

function loadComments() {
  fetchCall(`comments.inc.php?bid=${blogId}`, responseComments);
  function responseComments(data) {
    const comments = data.comments;
    const num = data.num;
    if (num > 0) {
      commentsnumberblog.textContent = num;
      const sliComments = comments.slice(0, 3);
      populateComments(sliComments);
      if (num > 3) {
        loadmorecomments.style.display = "block";
      }
    } else if (num <= 0) {
      emptycommentssection.style.display = "block";
      commentsnumberblog.textContent = 0;
    }
  }
}

function populateComments(comments) {
  actualcommentscontainer.innerHTML = ``;
  comments.forEach((comment) => {
    const mysqlDate = comment.date;
    const javascriptDate = new Date(mysqlDate).toLocaleDateString("en-UK", {
      year: "numeric",
      month: "short",
      day: "numeric",
    });
    const commentDiv = document.createElement("div");
    commentDiv.className = "comment-div";
    commentDiv.innerHTML = `
            <div class="name-date-comment">
                <div class="name-div-comment">
                    <div class="image-comment">
                        <i class="fa-solid fa-user"></i>
                        </div>
                    <div class="name-comment">${comment.username}</div>
                </div>
                <div>${javascriptDate}</div>
            </div>
            <div class="actualcomment">
                <p>${comment.comment}</p>
            </div>
            <div class="likecomment">
                <button type="button" onclick="likeComment(this)" data-id="${comment.id}" class="btn-readlike-white"><span>${comment.likes}</span> <i class="fa-regular fa-thumbs-up"></i>
                    <span>Likes</span></button>
            </div>
        `;

    actualcommentscontainer.append(commentDiv);
  });
}

function likeComment(element) {
  const id = element.dataset.id;
  fetchCall(`like.inc.php?cid=${id}`, respondCommentLike);
  function respondCommentLike(data) {
    if (data.msg == "success") {
      fetchCall(`loadlikes.inc.php?cid=${id}`, responseCLikes);
      function responseCLikes(data) {
        const likes = data.likes;
        element.innerHTML = `<span>${likes}</span> <i class="fa-regular fa-thumbs-up"></i><span>Likes</span>`;
        element.disabled = true;
      }
    }
  }
}

loadmorecomments.addEventListener("click", () => {
  fetchCall(`comments.inc.php?bid=${blogId}`, respondMore);
  function respondMore(data) {
    const comments = data.comments;
    populateComments(comments);
  }
});
