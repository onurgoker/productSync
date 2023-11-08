# productSync

Hedef: Bir Laravel komutu (artisan command) yazın, bu komut belirlenen periyodik aralıklarla belirli bir URL'den bir XML dosyası indirecek, içeriği işleyecek ve veritabanındaki products tablosunu güncelleyecektir.

Görevler:

XML İndirme:

Belirlenen URL'den XML dosyasını çekmek için bir HTTP istemcisi kullanın.İndirme işlemini Laravel'in görev zamanlaması (task scheduling) ile periyodik olarak ayarlayın.
XML İşleme:

İndirilen XML dosyasını parse edin ve ürün verilerini alın.Ürün verileri arasında en azından id, fiyat ve miktar bilgileri bulunmalıdır.
Veritabanı Güncellemesi:

products tablosunda her bir ürün için id değerini kontrol edin.Eğer ürün veritabanında yoksa, yeni bir kayıt olarak ekleyin.Eğer ürün veritabanında varsa ve fiyat veya miktar değerleri güncellenmişse, ilgili kaydı güncelleyin.XML'de olmayan ancak veritabanında olan ürünleri tespit edin ve silin.
Hata Yönetimi:

İşlemler sırasında oluşabilecek hataları ele alacak ve loglayacak bir mekanizma ekleyin.
Optimizasyon:

Veritabanı işlemlerinin performansını maksimize edecek yöntemleri uygulayın, örneğin toplu ekleme ve güncelleme işlemleri.
Testler:

Bu işlevsellik için birim testleri yazın.
Teslimat Kriterleri:

Komut dosyası ve ilgili tüm dosyalar GitHub üzerinden bir repo halinde teslim edilmelidir. Veritabanı migrasyonları ve seed'leri, test edilebilir veri seti oluşturmak üzere dahil edilmelidir. README dosyası, kurulum ve çalıştırma talimatlarını içermelidir.

Cevap alanına repo url iletiniz.
*
Aşağıdaki url ler örnek çalışma için kullanılabilir. Ancak repo içerisinde bulundurulmamalıdır.

XML Demo URL 1: https://www.zzgtech.com/demo_data/products_2022_06_01.xml
XML Demo URL 2: https://www.zzgtech.com/demo_data/products_2022_06_02.xml
