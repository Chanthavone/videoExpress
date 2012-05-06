/* Message de confirmation
@param[in] type : type de suppression (film ou abonné)
*/
function confirmerSuppression(type){
    if (type == "film") {
        var nom = "ce film";       
    }
    else {
        var nom = "cet abonné";
    }
    return(confirm('Voulez-vous vraiment supprimer ' + nom + '?')); 
}