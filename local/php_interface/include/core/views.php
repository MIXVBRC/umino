<? namespace Umino;


Class Views
{
    private $hlBlock;

    public function __construct($hlBlockID)
    {
        $this->hlBlock = new HL($hlBlockID);
    }

    public function add($newsID)
    {
        $elementID = $this->hlBlock->get(
            ['UF_NEWS_ID'=>$newsID],
            ['ID','UF_VIEWS']
        );

        if (!$elementID) {
            $elementID['ID'] = $this->hlBlock->add(
                [
                    'UF_NEWS_ID'=>$newsID,
                    'UF_VIEWS'=>1
                ]
            )->GetID();
        } else {
            $this->hlBlock->update(
                $elementID['ID'],
                ['UF_VIEWS'=>$elementID['UF_VIEWS']+1]
            );
        }
    }
}
