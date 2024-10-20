<?= $this->extend('layouts/adminTemplate') ?>
<?= $this->section('content1') ?>
<div class="content-wrapper">
    <section class="content">
        <div class="form-container">
            <form action="<?= site_url('/achat') ?>" method="POST" id="achatForm">
                <div class="form-group">
                    <h1>Proformat</h1>
                    <div>
                        <label><input type="radio" name="type" value="produit" id="radioProduit" checked> Produit</label>
                        <label><input type="radio" name="type" value="charge" id="radioCharge"> Charge</label>
                    </div>

                    <div id="fournisseurSelect" style="display: none;">
                        <label for="id_fournisseur">Fournisseur</label>
                        <select class="form-control" id="id_fournisseur" name="id_fournisseur[]" multiple>
                            <option value="">All</option>
                            <?php foreach ($fournisseur as $f): ?>
                            <option value="<?= $f['id_fournisseur']; ?>"><?= $f['nom']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div id="produitSelect">
                        <label for="id_produit">Produit</label>
                        <select class="form-control" id="id_produit" name="id_produit[]" multiple>
                            <option value="">All</option>
                            <?php foreach ($produit as $p): ?>
                            <option value="<?= $p['id_produit']; ?>"><?= $p['produit']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>


                    <div id="chargeSelect" style="display: none;">
                        <label for="id_charge">Charge</label>
                        <select class="form-control" id="id_charge" name="id_charge[]" multiple>
                            <option value="">All</option>
                            <?php foreach ($charge as $c): ?>
                            <option value="<?= $c['id_charge']; ?>"><?= $c['charge']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <label for="unite">Unité :</label>
                    <p id="uniteProduit" class="form-control"></p>
                    <p id="uniteCharge" class="form-control"></p>


                    <label for="quantite">Quantite :</label>
                    <input type="number" id="quantite" class="form-control" name="quantite" required>

                    <label for="date_livraison">Date Livraison :</label>
                    <input type="date" id="date_livraison" class="form-control" name="date_livraison" required>

                    <label for="date_commande">Date Commande :</label>
                    <input type="date" id="date_commande" class="form-control" name="date_commande" required>
                    <br>

                    <button type="button" class="btn btn-secondary" id="addToCartBtn">Ajouter au Panier</button>
                    <button type="submit" class="btn btn-primary">Valider</button>
                </div>
            </form>
        </div>

        <!-- Section du Panier -->
        <div id="cartSection" style="margin-top: 30px;">
            <div class="row">
                <div class="row col-md-12">
                    <div class="box box-solid">
                        <div class="box-header">
                            <h3 class="box-title" align="center">Panier</h3>
                        </div>
                        <div class="box-body table-responsive no-padding">
                            <div id="selectnonee">
                                <table id="cartTable" width="100%" border="0" align="center" cellpadding="3" cellspacing="3" class="table table-hover table-bordered" style="display:none;">
                                    <thead>
                                        <tr>
                                            <th width="20%" align="center" valign="top" style="background-color:#103a8e; color:white">Type</th>
                                            <th width="20%" align="center" valign="top" style="background-color:#103a8e; color:white">Produit/Charge</th>
                                            <th width="20%" align="center" valign="top" style="background-color:#103a8e; color:white">Fournisseur</th>
                                            <th width="15%" align="center" valign="top" style="background-color:#103a8e; color:white">Quantité</th>
                                            <th width="15%" align="center" valign="top" style="background-color:#103a8e; color:white">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="cartItems">
                                        <!-- Les articles du panier seront ajoutés ici dynamiquement -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
let cart = [];


document.getElementById('id_produit').addEventListener('change', function() {
    const productId = this.value;
    const uniteElement = document.getElementById('uniteProduit');
    if (productId) {
        fetch(`<?= site_url('get_produit_unite') ?>?id_produit=${productId}`)
            .then(response => response.json())
            .then(data => {
                uniteElement.textContent = data.produit_unite || '';
            })
            .catch(error => {
                console.error('Error:', error);
                uniteElement.textContent = '';
            });
    } else {
        uniteElement.textContent = '';
    }
});


document.getElementById('id_charge').addEventListener('change', function() {
    const chargeId = this.value;
    const uniteElement = document.getElementById('uniteCharge');
    if (chargeId) {
        fetch(`<?= site_url('get_charge_unite') ?>?id_charge=${chargeId}`)
            .then(response => response.json())
            .then(data => {
                uniteElement.textContent = data.charge_unite || '';
            })
            .catch(error => {
                console.error('Error:', error);
                uniteElement.textContent = '';
            });
    } else {
        uniteElement.textContent = '';
    }
});



document.addEventListener('DOMContentLoaded', function () {
    const radioProduit = document.getElementById('radioProduit');
    const radioCharge = document.getElementById('radioCharge');
    const produitSelect = document.getElementById('produitSelect');
    const chargeSelect = document.getElementById('chargeSelect');
    const fournisseurSelect = document.getElementById('fournisseurSelect');
    const uniteProduit = document.getElementById('uniteProduit');
    const uniteCharge = document.getElementById('uniteCharge');

    function toggleSelect() {
        if (radioProduit.checked) {
            produitSelect.style.display = 'block';
            chargeSelect.style.display = 'none';
            fournisseurSelect.style.display = 'none';
            uniteProduit.style.display = 'block';
            uniteCharge.style.display = 'none';
        } else if (radioCharge.checked) {
            produitSelect.style.display = 'none';
            chargeSelect.style.display = 'block';
            fournisseurSelect.style.display = 'block';
            uniteProduit.style.display = 'none';
            uniteCharge.style.display = 'block';
        }
    }

    radioProduit.addEventListener('change', toggleSelect);
    radioCharge.addEventListener('change', toggleSelect);

    toggleSelect();

    document.getElementById('addToCartBtn').onclick = function() {
    const type = radioProduit.checked ? 'produit' : 'charge';
    let items = [], fournisseurs = [];
    const quantity = parseInt(document.getElementById('quantite').value, 10);

    if (quantity <= 0) {
        alert("Veuillez entrer une quantité valide.");
        return;
    }

    if (type === 'produit') {
        const productSelect = document.getElementById('id_produit');
        Array.from(productSelect.selectedOptions).forEach(option => {
            items.push({
                id: option.value,
                name: option.text
            });
        });
        fournisseurs = [{ id: '', name: 'N/A' }];
    } else {
        const chargeSelect = document.getElementById('id_charge');
        const fournisseurSelect = document.getElementById('id_fournisseur');
        Array.from(chargeSelect.selectedOptions).forEach(option => {
            items.push({
                id: option.value,
                name: option.text
            });
        });
        Array.from(fournisseurSelect.selectedOptions).forEach(option => {
            fournisseurs.push({
                id: option.value,
                name: option.text
            });
        });
    }

    if (items.length === 0) {
        alert("Veuillez sélectionner au moins un item.");
        return;
    }

    items.forEach(item => {
        fournisseurs.forEach(fournisseur => {
            // Rechercher si l'item existe déjà dans le panier avec le même fournisseur
            const existingItemIndex = cart.findIndex(cartItem => 
                cartItem.type === type && 
                cartItem.item.id === item.id && 
                cartItem.fournisseur.id === fournisseur.id
            );

            if (existingItemIndex !== -1) {
                // Si l'item existe, additionner la quantité
                cart[existingItemIndex].quantite += quantity;
            } else {
                // Sinon, ajouter un nouvel item
                cart.push({
                    type: type,
                    item: item,
                    fournisseur: fournisseur,
                    quantite: quantity
                });
            }
        });
    });

    document.getElementById('cartTable').style.display = 'table';
    updateCartDisplay();
};
});

function updateCartDisplay() {
    const cartItems = document.getElementById('cartItems');
    cartItems.innerHTML = '';

    cart.forEach((item, index) => {
        const row = document.createElement('tr');

        const typeCell = document.createElement('td');
        typeCell.textContent = item.type === 'produit' ? 'Produit' : 'Charge';
        row.appendChild(typeCell);

        const itemCell = document.createElement('td');
        itemCell.textContent = item.item.name;
        row.appendChild(itemCell);

        const fournisseurCell = document.createElement('td');
        fournisseurCell.textContent = item.fournisseur.name;
        row.appendChild(fournisseurCell);

        const quantityCell = document.createElement('td');
        quantityCell.textContent = item.quantite;
        row.appendChild(quantityCell);

        const actionCell = document.createElement('td');
        const removeButton = document.createElement('button');
        removeButton.textContent = 'Retirer';
        removeButton.onclick = function() {
            removeFromCart(index);
        };
        actionCell.appendChild(removeButton);
        row.appendChild(actionCell);

        cartItems.appendChild(row);
    });
}

function removeFromCart(index) {
    cart.splice(index, 1);
    if (cart.length === 0) {
        document.getElementById('cartTable').style.display = 'none';
    }
    updateCartDisplay();
}

document.getElementById('achatForm').onsubmit = function(e) {
    e.preventDefault();
    
    document.querySelectorAll('.cart-hidden-input').forEach(input => input.remove());

    cart.forEach((item, index) => {
        const typeInput = document.createElement('input');
        typeInput.type = 'hidden';
        typeInput.name = `cart[${index}][type]`;
        typeInput.value = item.type;
        typeInput.classList.add('cart-hidden-input');
        this.appendChild(typeInput);

        const itemIdInput = document.createElement('input');
        itemIdInput.type = 'hidden';
        itemIdInput.name = `cart[${index}][${item.type}][id]`;
        itemIdInput.value = item.item.id;
        itemIdInput.classList.add('cart-hidden-input');
        this.appendChild(itemIdInput);

        const itemNameInput = document.createElement('input');
        itemNameInput.type = 'hidden';
        itemNameInput.name = `cart[${index}][${item.type}][name]`;
        itemNameInput.value = item.item.name;
        itemNameInput.classList.add('cart-hidden-input');
        this.appendChild(itemNameInput);

        const fournisseurIdInput = document.createElement('input');
        fournisseurIdInput.type = 'hidden';
        fournisseurIdInput.name = `cart[${index}][fournisseur][id]`;
        fournisseurIdInput.value = item.fournisseur.id;
        fournisseurIdInput.classList.add('cart-hidden-input');
        this.appendChild(fournisseurIdInput);

        const fournisseurNameInput = document.createElement('input');
        fournisseurNameInput.type = 'hidden';
        fournisseurNameInput.name = `cart[${index}][fournisseur][name]`;
        fournisseurNameInput.value = item.fournisseur.name;
        fournisseurNameInput.classList.add('cart-hidden-input');
        this.appendChild(fournisseurNameInput);

        const quantityInput = document.createElement('input');
        quantityInput.type = 'hidden';
        quantityInput.name = `cart[${index}][quantite]`;
        quantityInput.value = item.quantite;
        quantityInput.classList.add('cart-hidden-input');
        this.appendChild(quantityInput);
    });

    this.submit();
};
</script>

<?= $this->endSection('content1') ?>