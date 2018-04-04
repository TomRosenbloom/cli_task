<?php

class MarkdownOptions
{
    /**
     * set options for phpleague markdown converter
     *
     * @return [type] [description]
     */
    public function getOptions()
    {
        $options = array();
        $options_raw = getopt('', array(
            'use-asterisk',
            'use-underscore',
            'enable-strong',
            'enable-em',
            'safe',
        ));
        foreach ($options_raw as $option => $value) {
            switch ($option) {
                case 'use-asterisk':
                case 'use-underscore':
                case 'enable-strong':
                case 'enable-em':
                case 'safe':
                    if ($value !== true && $value !== false) {
                        fail("Invalid value '$value' for option '$option'");
                    }
                    break;
            }
            $options[str_replace('-', '_', $option)] = $value;
        }
        return $options;
    }

}
