import React, { useState, useEffect } from 'react';
import ReactDOM from 'react-dom';
import ProductRow from './ProductRow'

const ProductsFinder = () => {

    const [products, setProducts] = useState([])
    const [term, setTerm] = useState('')
    const [isSuccess, setIsSuccess] = useState(false)
    const [firstRequest, setFirstRequest] = useState(true)

    useEffect(() => {
        async function fetchProducts() {
            fetch("/products/findbyterm/yog")
            .then(res => res.json())
            .then((data) => {
                setProducts(data)
            })
        }
        //fetchProducts()
    });
      
    function handleFilterInputChange(e) {
        setTerm(e.target.value)
        if(e.target.value.length >= 3) {
            async function fetchProducts() {
                fetch("/products/findbyterm/"+e.target.value)
                .then(res => res.json())
                .then((data) => {
                    setFirstRequest(false)
                    setIsSuccess(true)
                    setProducts(data)
                })
            }
            fetchProducts()
        } else {
            setProducts([])
            setIsSuccess(false)
        }
    }

    const renderProductsTable = () => {
        if(products.length) {
            return (
                <table className="table table-striped table-hover table-condensed">
                <thead>
                    <tr>
                        <th>Code Produit</th>
                        <th>Désignation</th>
                        <th>Marque</th>
                        <th>Motorisation</th>
                        <th>Capacité</th>
                        <th>hauteur</th>
                        <th>Coloris</th>
                        <th>Statut</th>
                        <th>Stock Net</th>
                        <th>Famille</th>
                    </tr>
                </thead>
                    <tbody>
                        {products.map((product) => (
                        <ProductRow key={product.mmitno} product={product} />
                    ))}
                    </tbody>
                </table>
            )
        }
    }

    const renderProductsSummaryInfo = () => {
        if(products.length) {
            return (
                <div>
                    <h3>{products.length} produit(s) correspond(ent) à votre recherche.</h3>
                </div>
            )
        } else {
            if(term.length >= 3 && isSuccess) {
                return (
                    <div className='alert alert-warning'>
                        Aucun produit ne correspond à votre recherche.
                    </div>
                )
            } else {
                if(firstRequest) {
                    return (
                        <div>
                            <h3>Recherchez un produit en entrant son code produit, son nom, ou sa marque.</h3>
                            <p>Un minium de 3 caractères est nécessaires pour démarrer la recherche.</p>
                        </div>
                    )
                } else {
                    return (
                        <div>
                            <h3>Une autre recherche ?</h3>
                            <p>Un minium de 3 caractères est nécessaires pour démarrer la recherche.</p>
                        </div>
                    )
                }
            }
        }
    }

    return (
        <div>
            {renderProductsSummaryInfo()}
            <input className="form-control big-form-control" onChange={(e) => handleFilterInputChange(e) }/>
            {renderProductsTable()}
        </div>
    )
}

if (document.getElementById('products-finder')) {
    ReactDOM.render(<ProductsFinder />, document.getElementById('products-finder'))
}
