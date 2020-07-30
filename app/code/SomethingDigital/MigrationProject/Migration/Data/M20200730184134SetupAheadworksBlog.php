<?php

namespace SomethingDigital\MigrationProject\Migration\Data;

use Aheadworks\Blog\Model\PostFactory;
use Aheadworks\Blog\Model\ResourceModel\PostRepository;
use Aheadworks\Blog\Model\Rule\ProductFactory;
use Magento\CatalogRule\Model\Data\Condition\Converter;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Setup\SetupInterface;
use Psr\Log\LoggerInterface;
use SomethingDigital\Migration\Api\MigrationInterface;
use Magento\Config\Model\ResourceModel\Config as ResourceConfig;

class M20200730184134SetupAheadworksBlog implements MigrationInterface
{
    const ENABLED = 1;
    const DEFAULT_SCOPE_ID = 0;
    const DEFAULT_STORE_ID = 1;

    /**
     * @var ResourceConfig
     */
    protected $resourceConfig;
    /**
     * @var PostFactory
     */
    private $postFactory;
    /**
     * @var PostRepository
     */
    private $postRepository;
    /**
     * @var ProductFactory
     */
    private $productFactory;
    /**
     * @var Converter
     */
    private $converter;
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(
        ResourceConfig $resourceConfig,
        PostFactory $postFactory,
        PostRepository $postRepository,
        ProductFactory $productFactory,
        Converter $converter,
        LoggerInterface $logger
    ) {
        $this->resourceConfig = $resourceConfig;
        $this->postFactory = $postFactory;
        $this->postRepository = $postRepository;
        $this->productFactory = $productFactory;
        $this->converter = $converter;
        $this->logger = $logger;
    }

    public function execute(SetupInterface $setup)
    {
        $this->resourceConfig->saveConfig(
            'aw_blog/general/enabled',
            self::ENABLED,
            ScopeConfigInterface::SCOPE_TYPE_DEFAULT,
            self::DEFAULT_SCOPE_ID
        );

        try {
            $post = $this->postFactory->create();
            $post->setTitle('Lorem Ipsum');
            $post->setUrlKey('lorem-ipsum');
            $post->setShortContent("<div data-content-type=\"row\" data-appearance=\"contained\" data-element=\"main\"><div data-enable-parallax=\"0\" data-parallax-speed=\"0.5\" data-background-images=\"{}\" data-background-type=\"image\" data-video-loop=\"true\" data-video-play-only-visible=\"true\" data-video-lazy-load=\"true\" data-video-fallback-src=\"\" data-element=\"inner\" style=\"justify-content: flex-start; display: flex; flex-direction: column; background-position: left top; background-size: cover; background-repeat: no-repeat; background-attachment: scroll; border-style: none; border-width: 1px; border-radius: 0px; margin: 0px 0px 10px; padding: 10px;\"></div></div>");
            $post->setContent("<div data-content-type=\"row\" data-appearance=\"contained\" data-element=\"main\"><div data-enable-parallax=\"0\" data-parallax-speed=\"0.5\" data-background-images=\"{}\" data-background-type=\"image\" data-video-loop=\"true\" data-video-play-only-visible=\"true\" data-video-lazy-load=\"true\" data-video-fallback-src=\"\" data-element=\"inner\" style=\"justify-content: flex-start; display: flex; flex-direction: column; background-position: left top; background-size: cover; background-repeat: no-repeat; background-attachment: scroll; border-style: none; border-width: 1px; border-radius: 0px; margin: 0px 0px 10px; padding: 10px;\"><div data-content-type=\"text\" data-appearance=\"default\" data-element=\"main\" style=\"border-style: none; border-width: 1px; border-radius: 0px; margin: 0px; padding: 0px;\"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Egestas tellus rutrum tellus pellentesque eu tincidunt tortor. Eu scelerisque felis imperdiet proin fermentum leo vel orci. Luctus venenatis lectus magna fringilla. Aliquet nec ullamcorper sit amet risus nullam eget felis eget. Tempus iaculis urna id volutpat lacus. Dui nunc mattis enim ut tellus elementum sagittis vitae et. In nibh mauris cursus mattis molestie a. Donec enim diam vulputate ut pharetra sit amet aliquam. Sapien nec sagittis aliquam malesuada bibendum. Non enim praesent elementum facilisis leo vel fringilla. Turpis cursus in hac habitasse platea dictumst. Adipiscing commodo elit at imperdiet.</p>
            <p>In metus vulputate eu scelerisque felis imperdiet proin. Vehicula ipsum a arcu cursus vitae congue mauris. Ultrices in iaculis nunc sed augue. Vel eros donec ac odio tempor orci. Turpis egestas integer eget aliquet nibh praesent tristique magna. Libero justo laoreet sit amet cursus sit. Nunc vel risus commodo viverra maecenas accumsan lacus. Sagittis id consectetur purus ut faucibus pulvinar elementum integer enim. Habitant morbi tristique senectus et netus et malesuada. Laoreet id donec ultrices tincidunt. Odio aenean sed adipiscing diam. Ut diam quam nulla porttitor massa id neque aliquam vestibulum. Turpis egestas maecenas pharetra convallis posuere morbi leo urna molestie. Proin fermentum leo vel orci porta non pulvinar neque laoreet.</p>
            <p>Sed egestas egestas fringilla phasellus faucibus scelerisque eleifend donec. Egestas diam in arcu cursus euismod quis viverra. Risus sed vulputate odio ut enim blandit volutpat. Nullam ac tortor vitae purus faucibus ornare suspendisse sed nisi. Ac feugiat sed lectus vestibulum mattis. Netus et malesuada fames ac turpis. Ut faucibus pulvinar elementum integer enim neque volutpat ac tincidunt. Suspendisse interdum consectetur libero id faucibus nisl tincidunt eget. Euismod nisi porta lorem mollis aliquam ut porttitor. Lorem ipsum dolor sit amet consectetur adipiscing. Egestas dui id ornare arcu odio ut sem nulla. Elementum sagittis vitae et leo. A arcu cursus vitae congue mauris rhoncus. Orci phasellus egestas tellus rutrum.</p>
            <p>Elementum pulvinar etiam non quam lacus suspendisse faucibus. Cras semper auctor neque vitae tempus. Amet risus nullam eget felis eget nunc. Leo in vitae turpis massa sed elementum tempus. Sed tempus urna et pharetra pharetra. Et malesuada fames ac turpis egestas sed tempus urna. Interdum velit euismod in pellentesque. Nec tincidunt praesent semper feugiat nibh. Sed odio morbi quis commodo odio. Dictum at tempor commodo ullamcorper a lacus vestibulum sed arcu. Aliquet porttitor lacus luctus accumsan tortor posuere ac ut consequat. Senectus et netus et malesuada fames ac turpis egestas. Tortor condimentum lacinia quis vel eros donec ac odio. Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi tristique. Elementum pulvinar etiam non quam. Ut pharetra sit amet aliquam id diam maecenas. Urna porttitor rhoncus dolor purus non enim praesent. Ut faucibus pulvinar elementum integer enim neque volutpat ac tincidunt.</p>
            <p>Quis hendrerit dolor magna eget est. Non consectetur a erat nam at lectus urna. Eu lobortis elementum nibh tellus molestie nunc non blandit massa. Nec ullamcorper sit amet risus nullam eget. Tempus quam pellentesque nec nam. Nisl tincidunt eget nullam non nisi est sit amet facilisis. Malesuada nunc vel risus commodo viverra maecenas accumsan. Id cursus metus aliquam eleifend mi. Leo vel orci porta non pulvinar neque. Auctor elit sed vulputate mi sit amet mauris commodo quis.</p></div></div></div>");
            $post->setStatus('publication');
            $post->setIsAllowComments(1);
            $post->setProductCondition($this->getDefaultProductCondition());
            $post->setCustomerGroups('all');
            $post->setStoreIds(['1']);
            $this->postRepository->save($post);
        } catch (\Exception $e) {
            $this->logger->info('Failed to create test blog post');
            $this->logger->info($e->getMessage());
        }
    }

    private function getDefaultProductCondition()
    {
        $productRule = $this->productFactory->create();
        $arrayForConversion = $productRule->setConditions([])->getConditions()->asArray();
        return $this->converter->arrayToDataModel($arrayForConversion);
    }
}
