<?php

namespace EInvoice\tests;

use EInvoice\Core\Core;

class TestIssue extends BasicTest {

    /**
     * 发票开票
     *
     *
     * Author=> DQ
     */
    public function testIssue() {
        try {
            $mainLib = new Core($this->_config);

            $FPKJXX_FPTXX = [
                'FPQQLSH'    => sprintf("%s%s", $this->_config['data']['DSPTBM'], time().'000'),
                'DSPTBM'     => $this->_config['data']['DSPTBM'],
                'NSRSBH'     => $this->_config['data']['NSRSBH'],
                'NSRMC'      => $this->_config['data']['NSRMC'],
                'DKBZ'       => 0,
                'KPXM'       => '其他住房租赁服务',
                'BMB_BBH'    => '3040502020199',
                'XHF_NSRSBH' => $this->_config['config']['taxpayerId'],
                'XHFMC'      => $this->_config['data']['XHFMC'],
                'XHF_DZ'     => '云锦路500号',
                'GHFMC'      => '张三',
                'KPY'        => '李四',
                'GHFQYLX'    => '03',
                'KPLX'       => '1',
                'CZDM'       => '10',
                'QD_BZ'      => '0',
                'KPHJJE'     => 3200.00,
                'HJBHSJE'    => 0,
                'HJSE'       => 0,

            ];

            $FPKJXX_XMXXS = [
                [
                    'XMMC'   => '*经营租赁*房租',
                    'HSBZ'   => '1',
                    'FPHXZ'  => '0',
                    'XMDJ'   => 3200.00,
                    'SPBM'   => str_pad('3040502020199', 19, '0', STR_PAD_RIGHT),
                    'YHZCBS' => '0',
                    'XMJE'   => 3200.00,
                    'SL'     => '0.09',
                ],
            ];

            $FPKJXX_DDXX = [
                'DDH' => time()
            ];

            $return = $mainLib->issue($FPKJXX_FPTXX, $FPKJXX_XMXXS, $FPKJXX_DDXX);

            $this->assertNotEmpty($return, '发票开票 错误');
        } catch (\Exception $e) {
            $this->assertEmpty($e->getMessage(), "");
        }
    }

}