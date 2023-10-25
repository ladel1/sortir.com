function HandlePopupResult(result) {
    const parts = result.split("-");
    const selectLieuNode = document.querySelector("#sortie_lieu");
    const optionNode =  document.createElement("option");
    optionNode.value=parts[0];
    optionNode.innerText=parts[1];
    optionNode.selected = true;
    selectLieuNode.appendChild(optionNode)

}     
function openPopup(){
    window.open('http://127.0.0.1:8000/popup', 'about', 'width=500,height=600,scrollbars=yes');
}
jQuery(document).ready(function($){
$("select").change(function(){
  
    fetch("http://127.0.0.1:8000/lieu/"+this.value)
        .then(response=> response.json())
        .then(
            lieu=>{
                $("#cp").html(lieu.ville.codePostal)
                $("#rue").html(lieu.rue)
                $("#ville").html(lieu.ville.nom)
                $("#lat").html(lieu.latitude)
                $("#long").html(lieu.longitude)

                let address = `${lieu.rue} ${lieu.ville.nom} France`
                let API_KEY = "a12d2bce7c8d6abd13afb6553523ba93"
                let API_ENDPOINT = `http://api.positionstack.com/v1/forward?access_key=${API_KEY}&query=${address}&limit=1`
                fetch(API_ENDPOINT)
                    .then(apiResponse=>apiResponse.json())
                    .then(data=>{
                        console.log(data);
                        // $("#lat").html(data.data[0].latitude);
                        // $("#long").html(data.data[0].longitude);
                    })

            }
        )
        .catch(
            err=>{
                $("#cp").html("")
                $("#ville").html("")
                $("#rue").html("")
                $("#lat").html("")
                $("#long").html("")                      
            }
        )
})
})
