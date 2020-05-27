import React from 'react'

const ProductRow = ({product}) => {

    let rowClassName = ''
    if(product.mbstat == 20) {
        rowClassName = "table-success"
    } else if (product.mbstat == 50) {
        rowClassName = "table-warning"
    } else {
        rowClassName = "text-danger"
    }

    const renderBrand = () => {
        return product.mmitcl
    }

    const renderFamily = () => {
        let group = 'ND'
        switch(product.mmitgr) {
            case 'B200':
                group = 'MTB'
                break;
            case 'B300':
                group = 'SPORT'
                break;
            case 'B350':
                group = 'TREKKING'
                break;
            case 'B400':
                group = 'RACING'
                break;
            case 'B500':
                group = 'JUNIOR'
                break;
            case 'B600':
                group = 'OTHER'
                break;
            case 'B700':
                group = 'EBIKE'
                break;
            case 'B710':
                group = 'E-CITY'
                break;
            case 'B720':
                group = 'E-SPORT'
                break;
            case 'B730':
                group = 'E-MTB'
                break;
            case 'B740':
                group = 'E-ROAD'
                break;
            case 'B750':
                group = 'S-PEDELEC'
                break;
            case 'B760':
                group = 'E-JUNIOR'
                break;
            case 'B770':
                group = 'E-OTHER'
                break;
            case 'B780':
                group = 'E-FOLDING'
                break;
            case 'B790':
                group = 'E-CARGO'
                break;
            default:
                group = 'ND'
        }

        return group
    }

    return (
        <tr className={rowClassName}>
            <td>{product.mmitno}</td>
            <td>{product.mmitds}</td>
            <td>{renderBrand()}</td>
            <td>{product.mmspe1}</td>
            <td>{product.mmspe2}</td>
            <td>{product.size}</td>
            <td>{product.mmspe3}</td>
            <td>{product.mbstat}</td>
            <td width="50" className="text-right">{product.mbaval}</td>
            <td>{renderFamily()}</td>
        </tr>
    )

}

export default ProductRow;