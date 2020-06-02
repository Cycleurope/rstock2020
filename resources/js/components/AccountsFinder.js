import React, { useState, useEffect } from 'react'
import ReactDOM from 'react-dom'

const AccountsFinder = () => {

    const [accounts, setAccounts] = useState({})
    const [isSuccess, setIsSuccess] = useState(false)

    useEffect(() => {

    })

    function handleFilterInputChange(e) {
        if(e.target.value.length >= 3) {
            async function fetchAccounts() {
                fetch("/users/findbyidentifier/"+e.target.value)
                .then(res => res.json())
                .then((data) => {
                    setIsSuccess(true)
                    setAccounts(data)
                })
            }
            fetchAccounts()
        } else {
            setAccounts([])
            setIsSuccess(false)
        }
    }

    const renderAccountsTable = () => {
        if(accounts.length) {
            return (
                <table className="table table-condensed table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Statut</th>
                            <th>Identifiant</th>
                            <th>Nom</th>
                            <th>CP / Ville</th>
                            <th>Rep</th>
                            <th>Pin M3</th>
                            <th>Last Update</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        {accounts.map(account => (
                        <tr key={account.id}>
                            <td>{account.active}</td>
                            <td><b className="text-primary">{account.username}</b></td>
                            <td><a href={'users/'+account.username} className="">{account.name}</a></td>
                            <td>{account.postalcode} {account.city}</td>
                            <td>{account.resp}</td>
                            <td>{account.m3pin}</td>
                            <td>{account.updated_at}</td>
                            <td className="text-right"><a href={'users/'+account.username} className="btn btn-light">Consulter</a></td>
                        </tr>
                        ))}
                    </tbody>
                </table>
            )
        }
    }

    return (
        <div>
            <input className="form-control big-form-control" onChange={(e) => handleFilterInputChange(e) }/> 
            { renderAccountsTable() }
        </div>
    )

}

if (document.getElementById('accounts-finder')) {
    ReactDOM.render(<AccountsFinder />, document.getElementById('accounts-finder'))
}
