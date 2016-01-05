<?
/**
 * Nucleon Plus
 *
 * @package     Nucleon Plus
 * @copyright   Copyright (C) 2015 - 2020 Nucleon Plus Co. (http://www.nucleonplus.com)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        https://github.com/jebbdomingo/nucleonplus for the canonical source repository
 */

defined('KOOWA') or die; ?>

<?= helper('behavior.koowa'); ?>

<ktml:style src="media://koowa/com_koowa/css/koowa.css" />
<ktml:style src="media://com_nucleonplus/css/admin-read.css" />

<ktml:module position="toolbar">
    <ktml:toolbar type="actionbar" title="<?= ($invoice->id) ? 'Invoice No. ' . $invoice->id : 'New Invoice'; ?>" icon="task-add icon-pencil-2">
</ktml:module>

<div class="row-fluid">
    <div class="span9">
        <fieldset class="form-vertical">
            <form method="post" class="-koowa-form">
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Invoice Details</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td><strong>Invoice No.</strong></td>
                                    <td><?= $invoice->id ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Order No.</strong></td>
                                    <td><?= $invoice->order_id ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Product Package</strong></td>
                                    <td><?= $invoice->product_name ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Amount Due</strong></td>
                                    <td><?= $invoice->amount ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Status</strong></td>
                                    <td><span class="label label-<?= ($invoice->status <> 'paid') ? 'default' : 'info' ?>"><?= ucwords(escape($invoice->status)) ?></span></td>
                                </tr>
                                <tr>
                                    <td><label><strong><?= translate('Created On') ?></strong></label></td>
                                    <td>
                                        <div><?= helper('date.humanize', array('date' => $invoice->created_on)) ?></div>
                                        <div><?= $invoice->created_on ?></div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Note</h3>
                    </div>
                    <div class="panel-body">
                        <?= helper('editor.display', array(
                            'name'    => 'note',
                            'value'    => $invoice->note,
                            'height' => 100,
                            'options' => array(
                                'language'         => 'en',
                                'contentsLanguage' => 'en'
                            )
                        )) ?>
                    </div>
                </div>

            </form>
        </fieldset>
    </div>

    <div class="span3">
        <fieldset class="form-vertical">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= translate('Account Details'); ?></h3>
                </div>
                <table class="table">
                    <tbody>
                        <tr>
                            <td><label><strong><?= translate('Account No.') ?></strong></label></td>
                            <td><?= $invoice->customer_id ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </fieldset>
    </div>
</div>