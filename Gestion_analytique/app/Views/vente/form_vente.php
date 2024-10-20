<?= $this->extend('layouts/userTemplate') ?>
<?= $this->section('content2') ?>
<div class="content-wrapper">
    <section class="content">
        <div class="form-container">
            <form action="<?= site_url('/vente_validate') ?>" method="POST" id="venteForm">
                <h1>Vente</h1>
                <div class="form-group">
                    <label for="id_client">Client</label>
                    <select class="form-control" id="id_client" name="id_client">
                        <option value="">All</option>
                        <?php foreach ($client as $c): ?>
                            <option value="<?= $c['id_client']; ?>"><?= $c['nom']; ?></option>
                        <?php endforeach; ?>
                    </select>

                    <label for="id_produit">Produit</label>
                    <select class="form-control" id="id_produit" name="id_produit[]" multiple>
                        <?php foreach ($produit as $p): ?>
                            <option value="<?= $p['id_produit']; ?>"><?= $p['produit']; ?></option>
                        <?php endforeach; ?>
                    </select>

                    <label for="unite">Unité :</label>
                    <p id="unite" class="form-control"></p>

                    <label for="quantite">Quantité :</label>
                    <input type="number" id="quantite" class="form-control" required min="1">

                    <label for="date_commande_client">Date Commande Client :</label>
                    <input type="date" id="date_commande_client" class="form-control" name="date_commande_client" required>
                    
                    <label for="date_reception_commande">Date Réception Commande :</label>
                    <input type="date" id="date_reception_commande" class="form-control" name="date_reception_commande" required>
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
                                            <th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Produit</th>
                                            <th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Quantité</th>
                                            <th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Actions</th>
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

        <!-- Scripts -->
        <script>
            let cart = [];


            document.getElementById('id_produit').addEventListener('change', function() {
                const productId = this.value;
                const uniteElement = document.getElementById('unite');
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

            document.getElementById('addToCartBtn').onclick = function() {
                const productSelect = document.getElementById('id_produit');
                const productId = productSelect.value;
                const productText = productSelect.options[productSelect.selectedIndex].text;
                const quantity = parseInt(document.getElementById('quantite').value, 10);

                if (quantity <= 0) {
                    alert("Veuillez entrer une quantité valide.");
                    return;
                }

                const existingProduct = cart.find(item => item.idProduit === productId);
                if (existingProduct) {
                    existingProduct.quantite += quantity;
                } else {
                    cart.push({
                        idProduit: productId,
                        name: productText,
                        quantite: quantity
                    });
                }

                document.getElementById('cartTable').style.display = 'table';
                updateCartDisplay();
            };

            function updateCartDisplay() {
                const cartItems = document.getElementById('cartItems');
                cartItems.innerHTML = '';

                cart.forEach((item, index) => {
                    const row = document.createElement('tr');

                    const productCell = document.createElement('td');
                    productCell.textContent = item.name;
                    row.appendChild(productCell);

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

            document.getElementById('venteForm').onsubmit = function(e) {
                e.preventDefault();
                
                // Remove any existing hidden inputs
                document.querySelectorAll('.cart-hidden-input').forEach(input => input.remove());

                // Add each cart item as hidden input fields
                cart.forEach((item, index) => {
                    const productInput = document.createElement('input');
                    productInput.type = 'hidden';
                    productInput.name = `id_produit[${index}]`;
                    productInput.value = item.idProduit;
                    productInput.classList.add('cart-hidden-input');
                    this.appendChild(productInput);

                    const quantityInput = document.createElement('input');
                    quantityInput.type = 'hidden';
                    quantityInput.name = `quantite[${index}]`;
                    quantityInput.value = item.quantite;
                    quantityInput.classList.add('cart-hidden-input');
                    this.appendChild(quantityInput);
                });

                // Submit the form
                this.submit();
            };
        </script>
    </section>
</div>
<?= $this->endSection('content2') ?>