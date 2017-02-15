<?php
/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

class PosHelperImageUploader extends HelperImageUploader
{
    /**
     * @var float
     */
    protected $resized_height;
    
    /**
     * @param float $height
     */
    public function setResizedHeight($height)
    {
        $this->resized_height = $height;
    }
    
    /**
     * Resize image
     * @param string $file_path
     * @param string $file_name
     * @return boolean
     */
    public function resize($file_path, $file_name)
    {
        $resize_file_sizes = PosFile::getResizedFileSizes($this->resized_height, $file_path);
        return @ImageManager::resize($file_path, $file_name, $resize_file_sizes['width'], $resize_file_sizes['height']);
    }
}
