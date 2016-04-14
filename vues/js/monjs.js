/**
 * Created by webform on 1/03/2016.
 */

function confirmDelete(titre, id){
    var question = confirm("Voulez-vous vraiment supprimer « "+titre+ " »");
    if(question){
        document.location.href="?modifier&supprimer="+id;
    }
}
