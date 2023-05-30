document.addEventListener('DOMContentLoaded', loadAuthors);
const addparagraph = document.getElementById('addparagraph');
const sectionContainer = document.getElementById("sectioncontainers");
const authorselectdiv = document.getElementById("authorselectdiv");

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

addparagraph.addEventListener('click', ()=>{
    const contentsection = document.createElement('div');
    contentsection.className = "contentsection";
    contentsection.innerHTML = `
        <div class="contentsection-title">
            <div>Section</div>
            <button class="btnadd" type="button" onclick="removeSection(this)" id="addparagraph">Remove Section</button>
        </div>
        <div class="contentsection-content">
            <div class="paragraph">
                <div class="paragraph-title">
                    <label for="paratitle">Section Title</label>
                    <input type="text" name="paratitle[]" placeholder="Title">
                </div>
                <div class="paragraph-content">
                    <label for="paracontent">Section Content</label>
                    <textarea name="paracontent[]" cols="30" rows="10" placeholder="Content"></textarea>
                </div>
            </div>
        </div>
    `;
    sectionContainer.append(contentsection);
})

function removeSection(element){
    element.parentElement.parentElement.remove();
}

function loadAuthors(){
    fetchCall('loadauthors.inc.php', responseAuthors);
    function responseAuthors(data){
        const authors = data.authors;
        authors.forEach(author => {
            const option = document.createElement('option');
            option.setAttribute('value', author.id);
            option.textContent = author.name;

            authorselectdiv.append(option);
        });
        if(data.error){
            const option = document.createElement('option');
            option.textContent = "Error on load";

            authorselectdiv.append(option);
        }
    }
}