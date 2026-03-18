
let getParrain = (searchParrain, parrain) => {
    searchParrain?.addEventListener('input', function () {
        parrain.innerHTML = "";
        let data = new FormData()
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                let value = xhr.responseText
                
                if (value.length > 0) {
                    let tabArbre = value.split(':!')
                    for (let i = 1; i < tabArbre.length; i++) {
                        let tab = tabArbre[i].split(';?')
                        if (tab.length >= 2) {
                            let option = document.createElement('option')
                            option.value = tab[0]
                            option.innerHTML = tab[1]
                            parrain.appendChild(option)
                        }

                    }

                }





            }
        }


        data.append('_token', token.value)
        data.append('search_parrain', searchParrain.value)
        xhr.open("POST", '/search-parrain')
        xhr.send(data)
    })
}

let compteName = (searchParrain, parrain) => {
    searchParrain?.addEventListener('input', function () {
       console.log(searchParrain.value)
        let data = new FormData()
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                let value = xhr.responseText
                parrain.innerHTML = "";
                if (value.length > 0) {
                    let json = JSON.parse(value)
                    json.forEach(elt => {
                        let option = document.createElement('option')
                        option.value = elt.code
                        option.innerHTML = elt.compte_name
                        parrain.appendChild(option)
                    })

                }

            }
        }


        data.append('_token', token.value)
        data.append('compte_name', searchParrain.value)
        xhr.open("POST", '/search-compte')
        xhr.send(data)
    })
}

let getArbreGenealogique = (searchParrainGenealogie, matriculeArbre, matriculeParrain) => {
    searchParrainGenealogie?.addEventListener('input', function () {
        matriculeArbre.innerHTML = "";
        let data = new FormData()
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                let value = xhr.responseText
                if (value.length > 0) {
                    let tabArbre = value.split(':!')
                    for (let i = 1; i < tabArbre.length; i++) {
                        let tab = tabArbre[i].split(';?')
                        if (tab.length >= 2) {
                            let option = document.createElement('option')
                            option.value = tab[0]
                            option.innerHTML = tab[1]
                            matriculeArbre.appendChild(option)
                        }

                    }

                }

            }
        }


        data.append('_token', token.value)
        data.append('genealogie_matricule', searchParrainGenealogie.value)
        data.append('matriculeParrain', matriculeParrain.value)
        xhr.open("POST", '/search-parrain')
        xhr.send(data)
    })
}


let getProprietaire = (libelleProprietaire, matriculeAdherent) => {
    libelleProprietaire?.addEventListener('input', function () {

        let data = new FormData()
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                let value = xhr.responseText
                if (value.length > 0) {
                    matriculeAdherent.innerHTML = "";
                    let json = JSON.parse(value)
                    json.forEach(elt => {
                        let option = document.createElement('option')
                        option.value = elt.matricule_adherent
                        option.innerHTML = elt.nom + " " + elt.prenom
                        matriculeAdherent.appendChild(option)
                    })

                }




            }
        }


        data.append('_token', token.value)
        data.append('proprietaire', libelleProprietaire.value)
        xhr.open("POST", '/search-parrain')
        xhr.getResponseHeader("Content-type", "application/json");
        xhr.send(data)
    })
}

let getAllCompte = (libelleProprietaire, matriculeAdherent) => {
    libelleProprietaire?.addEventListener('input', function () {

        let data = new FormData()
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                let value = xhr.responseText
                if (value.length > 0) {
                    matriculeAdherent.innerHTML = "";
                    let json = JSON.parse(value)
                    json.forEach(elt => {
                        let option = document.createElement('option')
                        option.value = elt.matricule_compte
                        option.innerHTML = elt.compte_name
                        matriculeAdherent.appendChild(option)
                    })

                }




            }
        }


        data.append('_token', token.value)
        data.append('libelle_compte', libelleProprietaire.value)
        xhr.open("POST", '/search-parrain')
        xhr.getResponseHeader("Content-type", "application/json");
        xhr.send(data)
    })
}

let produit = (libelleProduit, matriculeProduit) => {
    libelleProduit?.addEventListener('input', function () {

        let data = new FormData()
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                let value = xhr.responseText
                if (value.length > 0) {
                    matriculeProduit.innerHTML = "";
                    let json = JSON.parse(value)
                    let quantite = document.querySelector("#add-compte #quantite")
                    let montant = document.querySelector("#add-compte #total")
                    let prixVente = document.querySelector("#add-compte #prix_vente")
                    let i = 0;
                    json.forEach(elt => {
                        let option = document.createElement('option')
                        option.value = elt.id
                        option.innerHTML = elt.libelle_produit
                        if (i == 0) {
                            if (prixVente != null) {
                                prixVente.value = elt.prix_vente
                                quantite.value = 1
                                montant.value = elt.prix_vente
                            }
                        }

                        matriculeProduit.appendChild(option)
                        i++
                    })

                }

            }
        }


        data.append('_token', token.value)
        data.append('libelle_produit', libelleProduit.value)
        xhr.open("POST", '/search-produit')
        xhr.getResponseHeader("Content-type", "application/json");
        xhr.send(data)
    })
}

let selectProduit = (matriculeProduit) => {
    matriculeProduit?.addEventListener('change', function () {

        let data = new FormData()
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                let value = xhr.responseText
                let quantite = document.querySelector("#add-compte #quantite")
                let montant = document.querySelector("#add-compte #total")
                let prixVente = document.querySelector("#add-compte #prix_vente")
                let json = JSON.parse(value)
                prixVente.value = json.prix_vente
                quantite.value = 1
                montant.value = json.prix_vente

            }
        }


        data.append('_token', token.value)
        data.append('produit_id', matriculeProduit.value)
        xhr.open("POST", '/select-produit')
        xhr.getResponseHeader("Content-type", "application/json");
        xhr.send(data)
    })
}

let loadDocument = () => {
    document.addEventListener("DOMContentLoaded", (event) => {
        alert("DOM fully loaded and parsed");
    });
}


