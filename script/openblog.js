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

function openBlog(element) {
  const blogId = element.dataset.id;
  const blogName = element.dataset.name;
  fetchCall(`views.inc.php?id=${blogId}`, respondView);
  function respondView(data) {
    console.log(data);
  }
  window.location.href = "blog?sv=" + blogId + "&blog=" + blogName;
}
