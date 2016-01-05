<?
/**
 * Nucleon Invoicing
 *
 * @package     Nucleon Invoicing
 * @copyright   Copyright (C) 2015 - 2020 Nucleon Plus Co. (http://www.nucleonplus.com)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        https://github.com/jebbdomingo/nucleonplus for the canonical source repository
 */
?>

<? foreach ($invoices as $invoice): ?>
    <tr>
        <td style="text-align: center;">
            <?= helper('grid.checkbox', array('entity' => $invoice)) ?>
        </td>
        <td class="deskman_table__title_field">
            <a href="<?= route('view=invoice&id='.$invoice->id); ?>">
                <?= $invoice->customer_id ?>
            </a>
        </td>
        <td><?= $invoice->order_id ?></td>
        <td><?= $invoice->product_name ?></td>
        <td><?= $invoice->amount ?></td>
        <td>
            <span class="label <?= ($invoice->status <> 'paid') ? 'label-default' : 'label-info' ?>"><?= ucwords(escape($invoice->status)) ?></span>
        </td>
    </tr>
<? endforeach; ?>