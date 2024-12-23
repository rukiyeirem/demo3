<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "demohm";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed! " . $conn->connect_error);
}

$products = [
    ['name' => 'ARMANI Lip Power - Lipstick', 'price' => 2440, 'image' => 'files/ruj1.jpg', 'category' => 'lipstick'],
    ['name' => 'RARE BEAUTY Lip Soufflé - Matte Liquid Lipstick', 'price' => 1099, 'image' => 'files/ruj2.jpg', 'category' => 'lipstick'],
    ['name' => 'YVES SAINT LAURENT YSL Loveshine - Glossy Care Lipstick', 'price' => 1960, 'image' => 'files/ruj3.jpg', 'category' => 'lipstick'],
    ['name' => 'DIOR Dior Addict - Parlak Ruj', 'price' => 1805, 'image' => 'files/ruj4.jpg', 'category' => 'lipstick'],
    ['name' => 'CHARLOTTE TILBURY Matte Revolution - Ruj', 'price' => 1729, 'image' => 'files/ruj5.jpg', 'category' => 'lipstick'],

    ['name' => 'LANCÔME Teint Idole Ultra Wear - Foundation', 'price' => 2450, 'image' => 'files/fondoten1.jpg', 'category' => 'foundation'],
    ['name' => 'YVES SAINT LAURENT All Hours - Foundation', 'price' => 2750, 'image' => 'files/fondoten2.jpg', 'category' => 'foundation'],
    ['name' => 'NARS Light Reflecting Foundation - Foundation', 'price'=> 2380, 'image' => 'files/fondoten3.jpg', 'category' => 'foundation'],
    ['name' => 'DIOR Forever Skin Glow - Foundation', 'price' => 2265, 'image' =>'files/fondoten4.jpg', 'category' => 'foundation'],
    ['name' => 'ESTÉE LAUDER Double Wear - Foundation A', 'price' => 1240, 'image' => 'files/fondoten5.jpg', 'category' => 'foundation'],

    ['name' => 'CLINIQUE Almost Lipstick Black Honey - Colored Lip Balm', 'price' => 980, 'image' => 'files/balm1.jpg', 'category' => 'lip balm'],
    ['name' => 'SUMMER FRIDAYS Sweet Mint LIP BALM', 'price'=> 1599, 'image' =>'files/balm2.jpg', 'category' => 'lip balm'],
    ['name' => 'LANEIGE Lip Glowy Balm - Lip Balm', 'price' => 1099, 'image' => 'files/balm3.jpg', 'category' => 'lip balm'],
    ['name' => 'DIOR Rouge Dior Balm - Lip Balm', 'price' => 1885, 'image' => 'files/balm4.jpg', 'category' => 'lip balm'],
    ['name' => 'TARTE Maracuja Juicy - Lip Balm', 'price' => 1199, 'image' => 'files/balm5.jpg', 'category' => 'lip balm'],

    [ 'name' => 'RARE BEAUTY Soft Pinch Blush - Mini Liquid Blush', 'price' => 899, 'image' => 'files/allık1.jpg', 'category'=> 'blush'],
    [ 'name' => 'HUDA BEAUTY Bush Filter - Liquid Blush', 'price' => 1139, 'image' => 'files/allık2.jpg', 'category' => 'blush'],
    [ 'name' => 'DIOR BACKSTAGE Rosy Glow - Blush', 'price' => 1650, 'image' => 'files/allık3.jpg', 'category' => 'blush'],
    [ 'name' => 'NARS Talc Free Blush - Blush', 'price' => 1950, 'image' => 'files/allık4.jpg', 'category' => 'blush'],
    [ 'name' => 'CHARLOTTE TILBURY Pillow Talk Matte Beauty Blush Wand - Matte Liquid Blush', 'price' => 1859, 'image' => 'files/allık5.jpg', 'category' => 'blush'],

    [ 'name' => 'HUDA BEAUTY Pretty Grunge - Eyeshadow Palette', 'price' => 3259, 'image' => 'files/far1.jpg', 'category' => 'eyeshadow'],
    [ 'name' => 'DIOR BACKSTAGE Dior Backstage Eye Palette - Eyeshadow Palette', 'price' => 2190, 'image' => 'files/far2.jpg', 'category' => 'eyeshadow'],
    [ 'name' => 'TARTE Tartelette™ In Bloom Clay Palette - Eyeshadow Palette', 'price' => 2199, 'image' => 'files/far3.jpg', 'category' => 'eyeshadow'],
    [ 'name' => 'SEPHORA COLLECTION Colorful Eyeshadow', 'price' => 359, 'image' => 'files/far4.jpg', 'category' => 'eyeshadow'],
    [ 'name' => 'YVES SAINT LAURENT Couture Mini Clutch - High Pigment Eyeshadow Palette', 'price' => 3600, 'image' => 'files/far5.jpg', 'category' => 'eyeshadow'],

    [ 'name' => 'RARE BEAUTY Positive Light - Liquid Highlighter', 'price' => 1399, 'image' => 'files/aydinlatici1.jpg', 'category' => 'highlighter'],
    [ 'name' => 'TARTE Glow Tape™ Highlighter - Liquid Highlighter', 'price' => 1659, 'image' => 'files/aydinlatici2.jpg', 'category' => 'highlighter'],
    [ 'name' => 'CHARLOTTE TILBURY Beauty Light Wand - Liquid Highlighter', 'price' => 1859, 'image' => 'files/aydinlatici3.jpg', 'category' => 'highlighter'],
    [ 'name' => 'FENTY BEAUTY Diamond Bomb All-Over Diamond Veil - Highlighter', 'price' => 1849, 'image' => 'files/aydinlatici4.jpg', 'category' => 'highlighter'],
    [ 'name' => 'DIOR Dior Forever Glow Maximizer - Longwear Liquid Highlighter', 'price' => 1575, 'image' => 'files/aydinlatici5.jpg', 'category' => 'highlighter'],

    [ 'name' => 'LANEIGE Plump, Firm & Glow Set - Face Care Set', 'price' => 1739, 'image' => 'files/cilt1.jpg', 'category' => 'skin care'],
    [ 'name' => 'LANCÔME HYDRA ZEN ANTI-STRESS RICH - CARE CREAM', 'price' => 2150, 'image' => 'files/cilt2.jpg', 'category' => 'skin care'],
    [ 'name' => 'ERBORIAN CC Red Correct - Redness Correcting CC Cream', 'price' => 1129, 'image' => 'files/cilt3.jpg', 'category' => 'skin care'],
    [ 'name' => 'ESTÉE LAUDER Supreme Magic Glow Repair + Hydrate 24/7', 'price' => 3740, 'image' => 'files/cilt4.jpg', 'category' => 'skin care'],
    [ 'name' => 'GLOW RECIPE Watermelon Glow - PHA + BHA Firming Toner', 'price' => 1899, 'image' => 'files/cilt5.jpg', 'category' => 'skin care'],

    [ 'name' => 'YVES SAINT LAURENT Lash Clash - Volume Mascara', 'price' => 2000, 'image' => 'files/maskara1.jpg', 'category' => 'mascara'],
    [ 'name' => 'BENEFIT COSMETICS Volume, Lifting and Volume Effect Mascara', 'price' => 1399, 'image' => 'files/maskara2.jpg', 'category' => 'mascara'],
    [ 'name' => 'LANCÔME Hypnôse Mascara - LE8 Serum Infused Mascara', 'price' => 1550, 'image' => 'files/maskara3.jpg', 'category' => 'mascara'],
    [ 'name' => 'CHARLOTTE TILBURY Pillow Talk Push Up Lashes - Mascara', 'price' => 1589, 'image' => 'files/maskara4.jpg', 'category' => 'mascara'],
    [ 'name' => 'SEPHORA COLLECTION Size Up - Mascara', 'price' => 719, 'image' => 'files/maskara5.jpg', 'category' => 'mascara'],

    [ 'name' => 'SEPHORA COLLECTION Nail Polish', 'price' => 199, 'image' => 'files/oje1.jpg', 'category' => 'nail polish'],
    [ 'name' => 'CHANEL LE VERNIS Nail Polish', 'price' => 1300, 'image' => 'files/oje2.jpg', 'category' => 'nail polish'],
    [ 'name' => 'DIOR Dior Vernis', 'price' => 1190, 'image' => 'files/oje3.jpg', 'category' => 'nail polish'],
    [ 'name' => 'CHANEL LA BASE CAMÉLIA Strengthening, Protective, and Smoothing Base Coat', 'price' => 1300, 'image' => 'files/oje4.jpg', 'category' => 'nail polish'],
    [ 'name' => 'SEPHORA COLLECTION Gentle Nail Polish Remover', 'price' => 339, 'image' => 'files/oje5.jpg', 'category' => 'nail polish'],

    [ 'name' => 'YVES SAINT LAURENT All Hours - Radiant Matte Concealer', 'price' => 2100, 'image' => 'files/kapatici1.jpg', 'category' => 'concealer'],
    [ 'name' => 'SEPHORA COLLECTION Best Skin Ever Concealer', 'price' => 719, 'image' => 'files/kapatici2.jpg', 'category' => 'concealer'],
    [ 'name' => 'ARMANI Luminous Silk Concealer - Illuminating and Natural Finish Multi-Purpose Concealer', 'price' => 2200, 'image' => 'files/kapatici3.jpg', 'category' => 'concealer'],
    [ 'name' => 'LANCÔME Teint Idole Ultra Wear Care & Glow Serum Concealer', 'price' => 1800, 'image' => 'files/kapatici4.jpg', 'category' => 'concealer'],
    [ 'name' => 'TARTE Shape Tape™ - Concealer', 'price' => 1459, 'image' => 'files/kapatici5.jpg', 'category' => 'concealer'],

    [ 'name' => 'HUDA BEAUTY Easy Blur Silicone-Free Smoothing Primer', 'price' => 1619, 'image' => 'files/baz1.jpg', 'category' => 'primer'],
    [ 'name' => 'BENEFIT COSMETICS the POREfessional - Pore Primer Travel Size', 'price' => 899, 'image' => 'files/baz2.jpg', 'category' => 'primer'],
    [ 'name' => 'RARE BEAUTY Always An Optimist - Illuminating Primer', 'price' => 1549, 'image' => 'files/baz3.jpg', 'category'=> 'primer'],
    [ 'name' => 'YVES SAINT LAURENT TOUCHE ÉCLAT BLUR PRIMER', 'price' => 2550, 'image' => 'files/baz4.jpg', 'category'=> 'primer'],
    [ 'name' => 'MILK MAKEUP Milk Hydro Grip Primer', 'price' => 1999, 'image' => 'files/baz5.jpg', 'category'=> 'primer'],

    [ 'name' => 'YVES SAINT LAURENT Libre - Eau de Parfum', 'price' => 3200, 'image' => 'files/parfüm1.jpg', 'category' => 'perfume'],
    [ 'name' => 'LANCÔME Idôle - Eau de Parfum', 'price' => 2750, 'image' => 'files/parfüm2.jpg', 'category' => 'perfume'],
    [ 'name' => 'ARMANI My Way - Eau de Parfum', 'price' => 2850, 'image' => 'files/parfüm3.jpg', 'category' => 'perfume'],
    [ 'name' => 'PRADA Paradoxe - Eau De Parfum', 'price' => 5850, 'image' => 'files/parfüm4.jpg', 'category' => 'perfume'],
    [ 'name' => 'VERSACE Versace Eros - Eau de Parfum', 'price' => 3460, 'image' => 'files/parfüm5.jpg', 'category' => 'perfume'],

    [ 'name' => 'BENEFIT COSMETICS Long-Lasting Black Eyeliner', 'price'=> 1359, 'image'=> 'files/eyeliner1.jpg', 'category'=> 'eyeliner'],
    [ 'name' => 'SEPHORA COLLECTION High Precision Eyeliner', 'price'=> 629, 'image'=> 'files/eyeliner2.jpg', 'category'=> 'eyeliner'],
    [ 'name' => 'YVES SAINT LAURENT Lines Liberated - Liner', 'price'=> 1550, 'image'=> 'files/eyeliner3.jpg', 'category'=> 'eyeliner'],
    [ 'name' => 'FENTY BEAUTY Flyliner', 'price'=> 1159, 'image'=> 'files/eyeliner4.jpg', 'category'=> 'eyeliner'],
    [ 'name' => 'HUDA BEAUTY Life Liner Quick ‘n Easy Precision Liquid Liner Mini', 'price'=> 559, 'image'=> 'files/eyeliner5.jpg', 'category'=> 'eyeliner'],

    [ 'name' => 'SEPHORA COLLECTION Professional Brush - Pro Foundation Brush #70', 'price'=> 1079, 'image'=> 'files/firçalar1.jpg', 'category'=> 'brushes'],
    [ 'name' => 'SEPHORA COLLECTION New Classic - Concealer Brush #02', 'price'=> 439, 'image'=> 'files/firçalar2.jpg', 'category'=> 'brushes'],
    [ 'name' => 'SEPHORA COLLECTION Pinceau Pro - Highlighter Brush #90', 'price'=> 1079, 'image'=> 'files/firçalar3.jpg', 'category'=> 'brushes'],
    [ 'name' => 'RARE BEAUTY Soft Pinch Liquid Blush Brush', 'price'=> 1099, 'image'=> 'files/firçalar4.jpg', 'category'=> 'brushes'],
    [ 'name' => 'HUDA BEAUTY Sculpt & Shade Brush', 'price'=> 1189, 'image'=> 'files/firçalar5.jpg', 'category'=> 'brushes'],

    [ 'name' => 'HUDA BEAUTY Baby Bake - Setting Powder', 'price'=> 999, 'image'=> 'files/pudra1.jpg', 'category'=> 'setting powder'],
    [ 'name' => 'FENTY BEAUTY Pro Filter Mini Instant Retouch - Setting Powder', 'price'=> 839, 'image'=> 'files/pudra2.jpg', 'category'=> 'setting powder'],
    [ 'name' => 'ANASTASIA BEVERLY HILLS Mini Loose Setting Powder', 'price'=> 979, 'image'=> 'files/pudra3.jpg', 'category'=> 'setting powder'],
    [ 'name' => 'NARS Nars Light - Compact Powder', 'price'=> 1270, 'image'=> 'files/pudra4.jpg', 'category'=> 'setting powder'],
    [ 'name' => 'LANCÔME LONG TIME NO SHINE - Setting Powder', 'price'=> 3000, 'image'=> 'files/pudra5.jpg', 'category'=> 'setting powder'],

    [ 'name' => 'SOL DE JANEIRO Bum Bum Jet Set - Body Care Set', 'price'=> 1899, 'image'=> 'files/vücut1.jpg', 'category'=> 'body care'],
    [ 'name' => 'THE INKEY LIST Glycolic Acid Exfoliating Body Stick', 'price'=> 859, 'image'=> 'files/vücut2.jpg', 'category'=> 'body care'],
    [ 'name' => 'CHANEL BLEU DE CHANEL Stick Deodorant', 'price'=> 1700, 'image'=> 'files/vücut3.jpg', 'category'=> 'body care'],
    [ 'name' => 'FENTY SKIN Butta Drop Cream – Moisturizing Body Cream', 'price'=> 2279, 'image'=> 'files/vücut4.jpg', 'category'=> 'body care'],
    [ 'name' => 'OUAI ST. BARTS - Body Cream', 'price'=> 2219, 'image'=> 'files/vücut5.jpg', 'category'=> 'body care'],

    [ 'name' => 'KÉRASTASE Genesis - Anti-Hair Loss Leave-In Scalp Serum', 'price'=>  2100, 'image'=>  'files/saç1.jpg', 'category'=>  'hair care'],
    [ 'name' => 'OLAPLEX N°3 Hair Perfector', 'price'=>  1790, 'image'=>  'files/saç2.jpg', 'category'=>  'hair care'],
    [ 'name' => 'GISOU Honey Infused Hair Mask', 'price'=>  1029, 'image'=>  'files/saç3.jpg', 'category'=>  'hair care'],
    [ 'name' => 'KÉRASTASE Nutritive Lait Vital - Detangling Conditioner for Dry Hair', 'price'=>  1450, 'image'=>  'files/saç4.jpg', 'category'=>  'hair care'],
    [ 'name' => 'GISOU Honey Infused Hair Oil', 'price'=>  1029, 'image'=>  'files/saç5.jpg', 'category'=>  'hair care'],

    [ 'name' => 'SHISEIDO Protective Face Cream SPF50+ - Sunscreen', 'price'=>  2850, 'image'=>  'files/güneş1.jpg', 'category'=>  'sun protection'],
    [ 'name' => 'SUPERGOOP! Glowscreen - Sunscreen with Hyaluronic Acid and Niacinamide SPF 30 PA+++', 'price'=>  2399, 'image'=>  'files/güneş2.jpg', 'category'=>  'sun protection'],
    [ 'name' => 'LANCÔME UV Expert Milky Bright - SPF 50 Sunscreen Cream', 'price'=>  2850, 'image'=>  'files/güneş3.jpg', 'category'=>  'sun protection'],
    [ 'name' => 'SUMMER FRIDAYS ShadeDrops SPF 30 - Sunscreen', 'price'=>  2419, 'image'=>  'files/güneş4.jpg', 'category'=>  'sun protection'],
    [ 'name' => 'CLINIQUE Clinique Sun - Mineral Sunscreen SPF 50', 'price'=>  1265, 'image'=>  'files/güneş5.jpg', 'category'=>  'sun protection']
    
    [ 'name' => 'JO MALONE LONDON Pomegranate Noir Home Candle - Candle', 'price'=>  2470, 'image'=>  'files/ev1.jpg', 'category'=>  'home products'],
    [ 'name' => 'JO MALONE LONDON Peony & Blush Suede - Diffuser', 'price'=>  3590, 'image'=>  'files/ev2.jpg', 'category'=> 'home products'],
    [ 'name' => 'SEPHORA COLLECTION Moving Lights - Night Lamp', 'price'=>  749, 'image'=>  'files/ev3.jpg', 'category'=>  'home products'],
    [ 'name' => 'SEPHORA COLLECTION Satin Pillowcase', 'price'=>  819, 'image'=>  'files/ev4.jpg', 'category'=>  'home products'],
    [ 'name' => 'ATELIER REBUL Bereket Scented Candle - Candle', 'price'=>  1100, 'image'=>  'files/ev5.jpg', 'category'=>  'home products'],
    
    [ 'name' => 'SEPHORA COLLECTION Powder Puff', 'price'=>  479, 'image'=>  'files/makyaj1.jpg', 'category'=>  'makeup tools'],
    [ 'name' => 'SEPHORA COLLECTION Beginner Brush Set', 'price'=>  1899, 'image'=>  'files/makyaj2.jpg', 'category'=>  'makeup tools'],
    [ 'name' => 'HUDA BEAUTY Powder Puff Easy Bake', 'price'=>  549, 'image'=> 'files/makyaj3.jpg', 'category'=> 'makeup tools'],
    [ 'name' => 'SEPHORA COLLECTION Flawless Complexion Sponge', 'price'=>  439, 'image'=>  'files/makyaj4.jpg', 'category'=>  'makeup tools'],
    [ 'name' => 'BEAUTYBLENDER Beautyblender Original - Makeup Sponge', 'price'=>  999, 'image'=>  'files/makyaj5.jpg', 'category'=>  'makeup tools'],

    ];


foreach ($products as $product) {
    $stmt = $conn->prepare("INSERT INTO products (name, price, image, category) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sdss", $product['name'], $product['price'], $product['image'], $product['category']);
    $stmt->execute();
}

echo "Products have been successfully added!";

$stmt->close();
$conn->close();
?>
