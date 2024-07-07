// JavaScript Document

// ------------Initialisation Ajax------------ 
function getXhr() {
    var xhr = null;
    if (window.XMLHttpRequest) // Firefox et autres
        xhr = new XMLHttpRequest();
    else if (window.ActiveXObject) { // Internet Explorer
        try {
            xhr = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            xhr = new ActiveXObject("Microsoft.XMLHTTP");
        }
    } else { // XMLHttpRequest non supporté par le navigateur
        alert("Votre navigateur ne supporte pas les objets XMLHTTP Request...");
        xhr = false;
    }
    return xhr;
}

//------------Fonctions Ajax------------------------------

function desactiver_langue(idlangue)
{
    var rsp = confirm("Voulez-vous vraiment Desactiver cette langue ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("desaclangue=" + idlangue);
    } else
    {
        alert("Désactivation de la langue annulée !");
    }

}
function activer_langue(idlangue)
{
    var rsp = confirm("Voulez-vous vraiment Activer cette langue ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("aclangue=" + idlangue);
    } else
    {
        alert("Activation de la langue annulée !");
    }

}
function del_langue(idlangue)
{
    var rsp = confirm("Voulez-vous vraiment Supprimer cette langue ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("dellangue=" + idlangue);
    } else
    {
        alert("Suppression de la langue annulée !");
    }

}

function desactiver_devise(iddevise)
{
    var rsp = confirm("Voulez-vous vraiment Desactiver cette devise ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("desacdevise=" + iddevise);
    } else
    {
        alert("Désactivation de la devise annulée !");
    }

}
function activer_devise(iddevise)
{
    var rsp = confirm("Voulez-vous vraiment Activer cette devise ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("acdevise=" + iddevise);
    } else
    {
        alert("Activation de la devise annulée !");
    }

}
function del_devise(iddevise)
{
    var rsp = confirm("Voulez-vous vraiment Supprimer cette devise ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("deldevise=" + iddevise);
    } else
    {
        alert("Suppression de la devise annulée !");
    }

}

function desactiver_pays(idpays)
{
    var rsp = confirm("Voulez-vous vraiment Desactiver ce pays ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("desacpays=" + idpays);
    } else
    {
        alert("Désactivation du pays annulée !");
    }

}
function activer_pays(idpays)
{
    var rsp = confirm("Voulez-vous vraiment Activer ce pays ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("acpays=" + idpays);
    } else
    {
        alert("Activation du pays annulée !");
    }

}
function del_pays(idpays)
{
    var rsp = confirm("Voulez-vous vraiment Supprimer ce pays ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("delpays=" + idpays);
    } else
    {
        alert("Suppression du pays annulée !");
    }

}

function desactiver_banque(idbanque)
{
    var rsp = confirm("Voulez-vous vraiment Desactiver cette banque ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("desacbanque=" + idbanque);
    } else
    {
        alert("Désactivation de la banque annulée !");
    }

}
function activer_banque(idbanque)
{
    var rsp = confirm("Voulez-vous vraiment Activer cette banque ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("acbanque=" + idbanque);
    } else
    {
        alert("Activation de la banque annulée !");
    }

}
function del_banque(idbanque)
{
    var rsp = confirm("Voulez-vous vraiment Supprimer cette banque ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("delbanque=" + idbanque);
    } else
    {
        alert("Suppression de la banque annulée !");
    }

}

function desactiver_comptebancaire(idcomptebancaire)
{
    var rsp = confirm("Voulez-vous vraiment Desactiver ce compte bancaire ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("desaccomptebancaire=" + idcomptebancaire);
    } else
    {
        alert("Désactivation du compte bancaire annulée !");
    }

}
function activer_comptebancaire(idcomptebancaire)
{
    var rsp = confirm("Voulez-vous vraiment Activer ce compte bancaire ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("accomptebancaire=" + idcomptebancaire);
    } else
    {
        alert("Activation du compte bancaire annulée !");
    }

}
function del_comptebancaire(idcomptebancaire)
{
    var rsp = confirm("Voulez-vous vraiment Supprimer ce compte bancaire ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("delcomptebancaire=" + idcomptebancaire);
    } else
    {
        alert("Suppression du compte bancaire annulée !");
    }

}

function desactiver_ville(idville)
{
    var rsp = confirm("Voulez-vous vraiment Desactiver cette ville ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("desacville=" + idville);
    } else
    {
        alert("Désactivation de la ville annulée !");
    }

}
function activer_ville(idville)
{
    var rsp = confirm("Voulez-vous vraiment Activer cette ville ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("acville=" + idville);
    } else
    {
        alert("Activation de la ville annulée !");
    }

}
function del_ville(idville)
{
    var rsp = confirm("Voulez-vous vraiment Supprimer cette ville ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("delville=" + idville);
    } else
    {
        alert("Suppression de la ville annulée !");
    }

}

function desactiver_typefournisseur(idtypefournisseur)
{
    var rsp = confirm("Voulez-vous vraiment Desactiver ce type fournisseur ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("desactypefournisseur=" + idtypefournisseur);
    } else
    {
        alert("Désactivation du type fournisseur annulée !");
    }

}
function activer_typefournisseur(idtypefournisseur)
{
    var rsp = confirm("Voulez-vous vraiment Activer ce type fournisseur ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("actypefournisseur=" + idtypefournisseur);
    } else
    {
        alert("Activation du type fournisseur annulée !");
    }

}
function del_typefournisseur(idtypefournisseur)
{
    var rsp = confirm("Voulez-vous vraiment Supprimer ce type fournisseur ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("deltypefournisseur=" + idtypefournisseur);
    } else
    {
        alert("Suppression du type fournisseur annulée !");
    }

}

function desactiver_entreprise(identreprise)
{
    var rsp = confirm("Voulez-vous vraiment Desactiver cet entreprise ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("desacentreprise=" + identreprise);
    } else
    {
        alert("Désactivation de l'entreprise annulée !");
    }

}
function activer_entreprise(identreprise)
{
    var rsp = confirm("Voulez-vous vraiment Activer cet entreprise ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("acentreprise=" + identreprise);
    } else
    {
        alert("Activation de l'entreprise annulée !");
    }

}
function del_entreprise(identreprise)
{
    var rsp = confirm("Voulez-vous vraiment Supprimer cet entreprise ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("delentreprise=" + identreprise);
    } else
    {
        alert("Suppression de l'entreprise annulée !");
    }

}

function desactiver_entete(identete)
{
    var rsp = confirm("Voulez-vous vraiment Desactiver cet entete ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("desacentete=" + identete);
    } else
    {
        alert("Désactivation de l'entete annulée !");
    }

}
function activer_entete(identete)
{
    var rsp = confirm("Voulez-vous vraiment Activer cet entete ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("acentete=" + identete);
    } else
    {
        alert("Activation de l'entete annulée !");
    }

}
function del_entete(identete)
{
    var rsp = confirm("Voulez-vous vraiment Supprimer cet entete ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("delentete=" + identete);
    } else
    {
        alert("Suppression de l'entete annulée !");
    }

}

function desactiver_memo(idmemo)
{
    var rsp = confirm("Voulez-vous vraiment Desactiver ce memo ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("desacmemo=" + idmemo);
    } else
    {
        alert("Désactivation du memo annulée !");
    }

}
function activer_memo(idmemo)
{
    var rsp = confirm("Voulez-vous vraiment Activer ce memo ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("acmemo=" + idmemo);
    } else
    {
        alert("Activation du memo annulée !");
    }

}
function del_memo(idmemo)
{
    var rsp = confirm("Voulez-vous vraiment Supprimer ce memo ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("delmemo=" + idmemo);
    } else
    {
        alert("Suppression du memo annulée !");
    }

}

function desactiver_charge(idcharge)
{
    var rsp = confirm("Voulez-vous vraiment Desactiver cette charge ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("desaccharge=" + idcharge);
    } else
    {
        alert("Désactivation de la charge annulée !");
    }

}
function activer_charge(idcharge)
{
    var rsp = confirm("Voulez-vous vraiment Activer cette charge ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("accharge=" + idcharge);
    } else
    {
        alert("Activation du la charge annulée !");
    }

}
function del_charge(idcharge)
{
    var rsp = confirm("Voulez-vous vraiment Supprimer cette charge ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("delcharge=" + idcharge);
    } else
    {
        alert("Suppression de la charge annulée !");
    }

}

function desactiver_departement(iddepartement)
{
    var rsp = confirm("Voulez-vous vraiment Desactiver ce departement ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("desacdepartement=" + iddepartement);
    } else
    {
        alert("Désactivation du département annulée !");
    }

}
function activer_departement(iddepartement)
{
    var rsp = confirm("Voulez-vous vraiment Activer ce département ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("acdepartement=" + iddepartement);
    } else
    {
        alert("Activation du département annulée !");
    }

}
function del_departement(iddepartement)
{
    var rsp = confirm("Voulez-vous vraiment Supprimer cet département ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("deldepartement=" + iddepartement);
    } else
    {
        alert("Suppression du département annulée !");
    }

}

function desactiver_utilisateur(idutilisateur)
{
    var rsp = confirm("Voulez-vous vraiment Desactiver cet utilisateur ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./pmfajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("desacutilisateur=" + idutilisateur);
    } else
    {
        alert("Désactivation de l'utilisateur annulée !");
    }

}
function activer_utilisateur(idutilisateur)
{
    var rsp = confirm("Voulez-vous vraiment Activer cet utilisateur ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("acutilisateur=" + idutilisateur);
    } else
    {
        alert("Activation de l'utilisateur annulée !");
    }

}
function activer_sign_utilisateur(idutilisateur)
{
    var rsp = confirm("Voulez-vous vraiment Activer cette signature ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("acutilisateursign=" + idutilisateur);
    } else
    {
        alert("Activation de la signature annulée !");
    }

}

function desactiver_fournisseur(idfournisseur)
{
    var rsp = confirm("Voulez-vous vraiment Desactiver ce fournisseur ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("desacfournisseur=" + idfournisseur);
    } else
    {
        alert("Désactivation du fournisseur annulée !");
    }

}
function activer_fournisseur(idfournisseur)
{
    var rsp = confirm("Voulez-vous vraiment Activer ce fournisseur ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("acfournisseur=" + idfournisseur);
    } else
    {
        alert("Activation du fournisseur annulée !");
    }

}

function desactiver_courrier(idcourrier)
{
    var rsp = confirm("Voulez-vous vraiment Desactiver ce courrier ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("desaccourrier=" + idcourrier);
    } else
    {
        alert("Désactivation du courrier annulée !");
    }

}
function activer_courrier(idcourrier)
{
    var rsp = confirm("Voulez-vous vraiment Activer ce courrier ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("accourrier=" + idcourrier);
    } else
    {
        alert("Activation du courrier annulée !");
    }

}

function archivebo_courrier(idcourrier)
{
    var rsp = confirm("Voulez-vous vraiment Archiver ce courrier ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("archibocourrier=" + idcourrier);
    } else
    {
        alert("Archivage du courrier annulé !");
    }

}
function archivecd_courrier(idcourrier)
{
    var rsp = confirm("Voulez-vous vraiment Archiver ce courrier ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("archicdcourrier=" + idcourrier);
    } else
    {
        alert("Archivage du courrier annulé !");
    }

}

function archivec_courrier(idcourrier)
{
    var rsp = confirm("Voulez-vous vraiment Archiver ce courrier ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("archiccourrier=" + idcourrier);
    } else
    {
        alert("Archivage du courrier annulé !");
    }

}
function archivef_courrier(idcourrier)
{
    var rsp = confirm("Voulez-vous vraiment Archiver ce courrier ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("archifcourrier=" + idcourrier);
    } else
    {
        alert("Archivage du courrier annulé !");
    }

}
function projetbenefique_courrier(idcourrier)
{
    var rsp = confirm("Voulez-vous vraiment Mettre ce projet comme Bénéfique ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("probencourrier=" + idcourrier);
    } else
    {
        alert("annulé !");
    }

}
function projetbenefiquen_courrier(idcourrier)
{
    var rsp = confirm("Voulez-vous vraiment Mettre ce projet comme non Bénéfique ?");
    if (rsp == true)
    {
        var xhr = getXhr();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resp = xhr.responseText;
                alert(resp);
            }
        }
        xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send("probencourriern=" + idcourrier);
    } else
    {
        alert("annulé !");
    }

}

function payer_positionnement(idpositionnement)
{
    var rsp = confirm("Voulez-vous vraiment valider le paiement de ce positionnement? cette action est irréversible ?");
    if (rsp == true)
    {
        var rsp2 = confirm("Confirmez vous ce paiement? cette action est irréversible ?");
        if (rsp2 == true)
        {
            var xhr = getXhr();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    resp = xhr.responseText;
                    alert(resp);
                }
            }
            xhr.open("POST", "./sotcocogajax/my_ajax_svr.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send("validerpayepositionnement=" + idpositionnement);
        } else
        {
            alert("confirmation annulée !");
        }
    } else
    {
        alert("annulé !");
    }

}

function deconnexion() {
    var gtk = confirm("Vous serez d\351connect\351 apr\350s confirmation !!!");
    if (gtk == true) {
        window.open("index.php?locks", "_self", false);
    } else {
        alert('D\351connexion annul\351e');
    }
}

$(document).ready(function () {
    $('#dataTables-pays').dataTable(); // Pour gerer les paginations biblioth�ques dataTable
});

window.onload = function () {
    setInterval(texteClignotant, 500);
};

/*[ Back to top ]
 ===========================================================*/
var windowH = $(window).height() / 2;

$(window).on('scroll', function () {
    if ($(this).scrollTop() > windowH) {
        $("#myBtn").css('display', 'flex');
    } else {
        $("#myBtn").css('display', 'none');
    }
});

$('#myBtn').on("click", function () {
    $('html, body').animate({scrollTop: 0}, 300);
});


//function add_to_card(idProduit) {
////    alert(idProduit);
//    var xhr1 = new XMLHttpRequest;
//    xhr1.open('POST','http://localhost/GTK/includes/session_panier.php');
//    xhr1.onreadystatechange = function() {
//        if (xhr1.readyState == 4 && xhr1.status == 200) {
//             // Et on affiche !
//             document.querySelector('#add_to_card').innerHTML = xhr1.responseText;
//            }
//        }
//    xhr1.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//xhr1.send('actionp=add&idp='+idProduit );
//};