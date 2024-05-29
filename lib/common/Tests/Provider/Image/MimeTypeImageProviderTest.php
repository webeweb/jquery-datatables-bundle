<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Tests\Provider\Image;

use WBW\Bundle\CommonBundle\Provider\Image\MimeTypeImageProvider;
use WBW\Bundle\CommonBundle\Provider\ImageProviderInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;

/**
 * Mime type image provider test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Provider\Image
 */
class MimeTypeImageProviderTest extends AbstractTestCase {

    /**
     * Images.
     *
     * @var array<string,string>
     */
    private const IMAGES = [
        "android/package-archive"                                                 => "android-package-archive.svg",
        "application/atom+xml"                                                    => "application-atom+xml.svg",
        "application/certificate"                                                 => "application-certificate.svg",
        "application/dicom"                                                       => "application-dicom.svg",
        "application/epub+zip"                                                    => "application-epub+zip.svg",
        "application/illustrator"                                                 => "application-illustrator.svg",
        "application/javascript"                                                  => "application-javascript.svg",
        "application/json"                                                        => "application-json.svg",
        "application/mac-binhex40"                                                => "application-mac-binhex40.svg",
        "application/msonenote"                                                   => "application-msonenote.svg",
        "application/msoutlook"                                                   => "application-msoutlook.svg",
        "application/msword-template"                                             => "application-msword-template.svg",
        "application/msword"                                                      => "application-msword.svg",
        "application/octet-stream"                                                => "application-octet-stream.svg",
        "application/ogg"                                                         => "application-ogg.svg",
        "application/pdf"                                                         => "application-pdf.svg",
        "application/pgp-encrypted"                                               => "application-pgp-encrypted.svg",
        "application/pgp-keys"                                                    => "application-pgp-keys.svg",
        "application/pgp-signature"                                               => "application-pgp-signature.svg",
        "application/pgp"                                                         => "application-pgp.svg",
        "application/pkcs7-mime"                                                  => "application-pkcs7-mime.svg",
        "application/pkcs7-signature"                                             => "application-pkcs7-signature.svg",
        "application/pkix-cerl"                                                   => "application-pkix-cerl.svg",
        "application/pkix-cert"                                                   => "application-pkix-cert.svg",
        "application/postscript"                                                  => "application-postscript.svg",
        "application/relaxng"                                                     => "application-relaxng.svg",
        "application/rss+xml"                                                     => "application-rss+xml.svg",
        "application/rtf"                                                         => "application-rtf.svg",
        "application/sxw"                                                         => "application-sxw.svg",
        "application/vnd-google-earth-kml"                                        => "application-vnd-google-earth-kml.svg",
        "application/vnd.android.package-archive"                                 => "application-vnd.android.package-archive.svg",
        "application/vnd.iccprofile"                                              => "application-vnd.iccprofile.svg",
        "application/vnd.ms-access"                                               => "application-vnd.ms-access.svg",
        "application/vnd.ms-excel.addin.macroenabled.12"                          => "application-vnd.ms-excel.addin.macroenabled.12.svg",
        "application/vnd.ms-excel.sheet.binary.macroenabled.12"                   => "application-vnd.ms-excel.sheet.binary.macroenabled.12.svg",
        "application/vnd.ms-excel.sheet.macroenabled.12"                          => "application-vnd.ms-excel.sheet.macroenabled.12.svg",
        "application/vnd.ms-excel"                                                => "application-vnd.ms-excel.svg",
        "application/vnd.ms-excel.template.macroenabled.12"                       => "application-vnd.ms-excel.template.macroenabled.12.svg",
        "application/vnd.ms-infopath"                                             => "application-vnd.ms-infopath.svg",
        "application/vnd.ms-powerpoint.addin.macroenabled.12"                     => "application-vnd.ms-powerpoint.addin.macroenabled.12.svg",
        "application/vnd.ms-powerpoint.presentation.macroenabled.12"              => "application-vnd.ms-powerpoint.presentation.macroenabled.12.svg",
        "application/vnd.ms-powerpoint.slide.macroenabled.12"                     => "application-vnd.ms-powerpoint.slide.macroenabled.12.svg",
        "application/vnd.ms-powerpoint.slideshow.macroenabled.12"                 => "application-vnd.ms-powerpoint.slideshow.macroenabled.12.svg",
        "application/vnd.ms-powerpoint"                                           => "application-vnd.ms-powerpoint.svg",
        "application/vnd.ms-powerpoint.template.macroenabled.12"                  => "application-vnd.ms-powerpoint.template.macroenabled.12.svg",
        "application/vnd.ms-publisher"                                            => "application-vnd.ms-publisher.svg",
        "application/vnd.ms-word.document.macroenabled.12"                        => "application-vnd.ms-word.document.macroenabled.12.svg",
        "application/vnd.ms-word"                                                 => "application-vnd.ms-word.svg",
        "application/vnd.ms-word.template.macroenabled.12"                        => "application-vnd.ms-word.template.macroenabled.12.svg",
        "application/vnd.nintendo.snes.rom"                                       => "application-vnd.nintendo.snes.rom.svg",
        "application/vnd.oasis.opendocument.chart"                                => "application-vnd.oasis.opendocument.chart.svg",
        "application/vnd.oasis.opendocument.database"                             => "application-vnd.oasis.opendocument.database.svg",
        "application/vnd.oasis.opendocument.draw.template"                        => "application-vnd.oasis.opendocument.draw.template.svg",
        "application/vnd.oasis.opendocument.drawing"                              => "application-vnd.oasis.opendocument.drawing.svg",
        "application/vnd.oasis.opendocument.drawing.template"                     => "application-vnd.oasis.opendocument.drawing.template.svg",
        "application/vnd.oasis.opendocument.formula-template"                     => "application-vnd.oasis.opendocument.formula-template.svg",
        "application/vnd.oasis.opendocument.formula"                              => "application-vnd.oasis.opendocument.formula.svg",
        "application/vnd.oasis.opendocument.graphics"                             => "application-vnd.oasis.opendocument.graphics.svg",
        "application/vnd.oasis.opendocument.image"                                => "application-vnd.oasis.opendocument.image.svg",
        "application/vnd.oasis.opendocument.presentation-template"                => "application-vnd.oasis.opendocument.presentation-template.svg",
        "application/vnd.oasis.opendocument.presentation"                         => "application-vnd.oasis.opendocument.presentation.svg",
        "application/vnd.oasis.opendocument.spreadsheet-template"                 => "application-vnd.oasis.opendocument.spreadsheet-template.svg",
        "application/vnd.oasis.opendocument.spreadsheet"                          => "application-vnd.oasis.opendocument.spreadsheet.svg",
        "application/vnd.oasis.opendocument.text-master"                          => "application-vnd.oasis.opendocument.text-master.svg",
        "application/vnd.oasis.opendocument.text-template"                        => "application-vnd.oasis.opendocument.text-template.svg",
        "application/vnd.oasis.opendocument.text"                                 => "application-vnd.oasis.opendocument.text.svg",
        "application/vnd.oasis.opendocument.web-template"                         => "application-vnd.oasis.opendocument.web-template.svg",
        "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"       => "application-vnd.openxmlformats-officedocument.spreadsheetml.sheet.svg",
        "application/vnd.openxmlformats-officedocument.wordprocessingml.document" => "application-vnd.openxmlformats-officedocument.wordprocessingml.document.svg",
        "application/vnd.rar"                                                     => "application-vnd.rar.svg",
        "application/vnd.rn-realmedia"                                            => "application-vnd.rn-realmedia.svg",
        "application/vnd.scribus"                                                 => "application-vnd.scribus.svg",
        "application/vnd.stardivision.calc"                                       => "application-vnd.stardivision.calc.svg",
        "application/vnd.stardivision.draw"                                       => "application-vnd.stardivision.draw.svg",
        "application/vnd.stardivision.mail"                                       => "application-vnd.stardivision.mail.svg",
        "application/vnd.stardivision.math"                                       => "application-vnd.stardivision.math.svg",
        "application/vnd.sun.xml.calc"                                            => "application-vnd.sun.xml.calc.svg",
        "application/vnd.sun.xml.calc.template"                                   => "application-vnd.sun.xml.calc.template.svg",
        "application/vnd.sun.xml.draw"                                            => "application-vnd.sun.xml.draw.svg",
        "application/vnd.sun.xml.draw.template"                                   => "application-vnd.sun.xml.draw.template.svg",
        "application/vnd.sun.xml.impress"                                         => "application-vnd.sun.xml.impress.svg",
        "application/vnd.sun.xml.impress.template"                                => "application-vnd.sun.xml.impress.template.svg",
        "application/vnd.sun.xml.math"                                            => "application-vnd.sun.xml.math.svg",
        "application/vnd.sun.xml.writer.global"                                   => "application-vnd.sun.xml.writer.global.svg",
        "application/vnd.sun.xml.writer"                                          => "application-vnd.sun.xml.writer.svg",
        "application/vnd.sun.xml.writer.template"                                 => "application-vnd.sun.xml.writer.template.svg",
        "application/vnd.visio"                                                   => "application-vnd.visio.svg",
        "application/vnd.wordperfect"                                             => "application-vnd.wordperfect.svg",
        "application/wps-office.doc"                                              => "application-wps-office.doc.svg",
        "application/wps-office.docx"                                             => "application-wps-office.docx.svg",
        "application/wps-office.dot"                                              => "application-wps-office.dot.svg",
        "application/wps-office.dotx"                                             => "application-wps-office.dotx.svg",
        "application/wps-office.pot"                                              => "application-wps-office.pot.svg",
        "application/wps-office.potx"                                             => "application-wps-office.potx.svg",
        "application/wps-office.ppt"                                              => "application-wps-office.ppt.svg",
        "application/wps-office.pptx"                                             => "application-wps-office.pptx.svg",
        "application/wps-office.xls"                                              => "application-wps-office.xls.svg",
        "application/wps-office.xlsx"                                             => "application-wps-office.xlsx.svg",
        "application/wps-office.xlt"                                              => "application-wps-office.xlt.svg",
        "application/wps-office.xltx"                                             => "application-wps-office.xltx.svg",
        "application/x-7z-compressed"                                             => "application-x-7z-compressed.svg",
        "application/x-abiword"                                                   => "application-x-abiword.svg",
        "application/x-ace"                                                       => "application-x-ace.svg",
        "application/x-apple-diskimage"                                           => "application-x-apple-diskimage.svg",
        "application/x-applix-spreadsheet"                                        => "application-x-applix-spreadsheet.svg",
        "application/x-applix-word"                                               => "application-x-applix-word.svg",
        "application/x-ar"                                                        => "application-x-ar.svg",
        "application/x-arc"                                                       => "application-x-arc.svg",
        "application/x-archive"                                                   => "application-x-archive.svg",
        "application/x-arj"                                                       => "application-x-arj.svg",
        "application/x-awk"                                                       => "application-x-awk.svg",
        "application/x-bittorrent"                                                => "application-x-bittorrent.svg",
        "application/x-blender"                                                   => "application-x-blender.svg",
        "application/x-bzdvi"                                                     => "application-x-bzdvi.svg",
        "application/x-bzip-compressed-tar"                                       => "application-x-bzip-compressed-tar.svg",
        "application/x-bzip"                                                      => "application-x-bzip.svg",
        "application/x-cd-image"                                                  => "application-x-cd-image.svg",
        "application/x-cda"                                                       => "application-x-cda.svg",
        "application/x-chm"                                                       => "application-x-chm.svg",
        "application/x-compress"                                                  => "application-x-compress.svg",
        "application/x-compressed-tar"                                            => "application-x-compressed-tar.svg",
        "application/x-cpio"                                                      => "application-x-cpio.svg",
        "application/x-cue"                                                       => "application-x-cue.svg",
        "application/x-deb"                                                       => "application-x-deb.svg",
        "application/x-designer"                                                  => "application-x-designer.svg",
        "application/x-desktop"                                                   => "application-x-desktop.svg",
        "application/x-egon"                                                      => "application-x-egon.svg",
        "application/x-executable-script"                                         => "application-x-executable-script.svg",
        "application/x-executable"                                                => "application-x-executable.svg",
        "application/x-flash-video"                                               => "application-x-flash-video.svg",
        "application/x-font-afm"                                                  => "application-x-font-afm.svg",
        "application/x-font-bdf"                                                  => "application-x-font-bdf.svg",
        "application/x-font-otf"                                                  => "application-x-font-otf.svg",
        "application/x-font-pcf"                                                  => "application-x-font-pcf.svg",
        "application/x-font-snf"                                                  => "application-x-font-snf.svg",
        "application/x-font-ttf"                                                  => "application-x-font-ttf.svg",
        "application/x-font-type1"                                                => "application-x-font-type1.svg",
        "application/x-gameboy-rom"                                               => "application-x-gameboy-rom.svg",
        "application/x-gamecube-rom"                                              => "application-x-gamecube-rom.svg",
        "application/x-gba-rom"                                                   => "application-x-gba-rom.svg",
        "application/x-gettext-translation"                                       => "application-x-gettext-translation.svg",
        "application/x-gnumeric"                                                  => "application-x-gnumeric.svg",
        "application/x-gzdvi"                                                     => "application-x-gzdvi.svg",
        "application/x-gzip"                                                      => "application-x-gzip.svg",
        "application/x-gzpostscript"                                              => "application-x-gzpostscript.svg",
        "application/x-iso"                                                       => "application-x-iso.svg",
        "application/x-it87"                                                      => "application-x-it87.svg",
        "application/x-jar"                                                       => "application-x-jar.svg",
        "application/x-java-applet"                                               => "application-x-java-applet.svg",
        "application/x-java-archive"                                              => "application-x-java-archive.svg",
        "application/x-java"                                                      => "application-x-java.svg",
        "application/x-javascript"                                                => "application-x-javascript.svg",
        "application/x-k3b"                                                       => "application-x-k3b.svg",
        "application/x-kcsrc"                                                     => "application-x-kcsrc.svg",
        "application/x-kdenlivetitle"                                             => "application-x-kdenlivetitle.svg",
        "application/x-kexi-connectiondata"                                       => "application-x-kexi-connectiondata.svg",
        "application/x-kexiproject-shortcut"                                      => "application-x-kexiproject-shortcut.svg",
        "application/x-kexiproject-sqlite"                                        => "application-x-kexiproject-sqlite.svg",
        "application/x-kexiproject-sqlite2"                                       => "application-x-kexiproject-sqlite2.svg",
        "application/x-kexiproject-sqlite3"                                       => "application-x-kexiproject-sqlite3.svg",
        "application/x-kformula"                                                  => "application-x-kformula.svg",
        "application/x-kgetlist"                                                  => "application-x-kgetlist.svg",
        "application/x-kontour"                                                   => "application-x-kontour.svg",
        "application/x-kplato"                                                    => "application-x-kplato.svg",
        "application/x-krita"                                                     => "application-x-krita.svg",
        "application/x-kvtml"                                                     => "application-x-kvtml.svg",
        "application/x-kword"                                                     => "application-x-kword.svg",
        "application/x-lha"                                                       => "application-x-lha.svg",
        "application/x-lyx"                                                       => "application-x-lyx.svg",
        "application/x-lzma-compressed-tar"                                       => "application-x-lzma-compressed-tar.svg",
        "application/x-lzop"                                                      => "application-x-lzop.svg",
        "application/x-m4"                                                        => "application-x-m4.svg",
        "application/x-macbinary"                                                 => "application-x-macbinary.svg",
        "application/x-marble"                                                    => "application-x-marble.svg",
        "application/x-mimearchive"                                               => "application-x-mimearchive.svg",
        "application/x-mplayer2"                                                  => "application-x-mplayer2.svg",
        "application/x-ms-dos-executable"                                         => "application-x-ms-dos-executable.svg",
        "application/x-ms-shortcut"                                               => "application-x-ms-shortcut.svg",
        "application/x-mswinurl"                                                  => "application-x-mswinurl.svg",
        "application/x-mswrite"                                                   => "application-x-mswrite.svg",
        "application/x-n64-rom"                                                   => "application-x-n64-rom.svg",
        "application/x-nes-rom"                                                   => "application-x-nes-rom.svg",
        "application/x-nintendo-ds-rom"                                           => "application-x-nintendo-ds-rom.svg",
        "application/x-nzb"                                                       => "application-x-nzb.svg",
        "application/x-object"                                                    => "application-x-object.svg",
        "application/x-pak"                                                       => "application-x-pak.svg",
        "application/x-partial-download"                                          => "application-x-partial-download.svg",
        "application/x-pem-key"                                                   => "application-x-pem-key.svg",
        "application/x-perl"                                                      => "application-x-perl.svg",
        "application/x-php"                                                       => "application-x-php.svg",
        "application/x-pkcs12"                                                    => "application-x-pkcs12.svg",
        "application/x-pkcs7-certificates"                                        => "application-x-pkcs7-certificates.svg",
        "application/x-plasma"                                                    => "application-x-plasma.svg",
        "application/x-python-bytecode"                                           => "application-x-python-bytecode.svg",
        "application/x-qet-element"                                               => "application-x-qet-element.svg",
        "application/x-qet-project"                                               => "application-x-qet-project.svg",
        "application/x-quattropro"                                                => "application-x-quattropro.svg",
        "application/x-rar"                                                       => "application-x-rar.svg",
        "application/x-raw-disk-image"                                            => "application-x-raw-disk-image.svg",
        "application/x-rdata"                                                     => "application-x-rdata.svg",
        "application/x-rpm"                                                       => "application-x-rpm.svg",
        "application/x-ruby"                                                      => "application-x-ruby.svg",
        "application/x-sharedlib"                                                 => "application-x-sharedlib.svg",
        "application/x-shellscript"                                               => "application-x-shellscript.svg",
        "application/x-shockwave-flash"                                           => "application-x-shockwave-flash.svg",
        "application/x-siag"                                                      => "application-x-siag.svg",
        "application/x-sif"                                                       => "application-x-sif.svg",
        "application/x-skg"                                                       => "application-x-skg.svg",
        "application/x-skgc"                                                      => "application-x-skgc.svg",
        "application/x-smb-server"                                                => "application-x-smb-server.svg",
        "application/x-smb-workgroup"                                             => "application-x-smb-workgroup.svg",
        "application/x-source-rpm"                                                => "application-x-source-rpm.svg",
        "application/x-sqlite2"                                                   => "application-x-sqlite2.svg",
        "application/x-sqlite3"                                                   => "application-x-sqlite3.svg",
        "application/x-srt"                                                       => "application-x-srt.svg",
        "application/x-srtrip"                                                    => "application-x-srtrip.svg",
        "application/x-subrip"                                                    => "application-x-subrip.svg",
        "application/x-tar"                                                       => "application-x-tar.svg",
        "application/x-tarz"                                                      => "application-x-tarz.svg",
        "application/x-tgif"                                                      => "application-x-tgif.svg",
        "application/x-theme"                                                     => "application-x-theme.svg",
        "application/x-trash"                                                     => "application-x-trash.svg",
        "application/x-troff-man"                                                 => "application-x-troff-man.svg",
        "application/x-tzo"                                                       => "application-x-tzo.svg",
        "application/x-wmf"                                                       => "application-x-wmf.svg",
        "application/x-x509-ca-cert"                                              => "application-x-x509-ca-cert.svg",
        "application/x-x509-user-cert"                                            => "application-x-x509-user-cert.svg",
        "application/x-xliff"                                                     => "application-x-xliff.svg",
        "application/x-xpinstall"                                                 => "application-x-xpinstall.svg",
        "application/x-xz-compressed-tar"                                         => "application-x-xz-compressed-tar.svg",
        "application/x-xz-pkg"                                                    => "application-x-xz-pkg.svg",
        "application/x-zerosize"                                                  => "application-x-zerosize.svg",
        "application/x-zoo"                                                       => "application-x-zoo.svg",
        "application/xhtml+xml"                                                   => "application-xhtml+xml.svg",
        "application/xmind"                                                       => "application-xmind.svg",
        "application/xml"                                                         => "application-xml.svg",
        "application/xsd"                                                         => "application-xsd.svg",
        "application/xslt+xml"                                                    => "application-xslt+xml.svg",
        "application/zip"                                                         => "application-zip.svg",
        "audio/ac3"                                                               => "audio-ac3.svg",
        "audio/flac"                                                              => "audio-flac.svg",
        "audio/midi"                                                              => "audio-midi.svg",
        "audio/mp2"                                                               => "audio-mp2.svg",
        "audio/mp3"                                                               => "audio-mp3.svg",
        "audio/mp4"                                                               => "audio-mp4.svg",
        "audio/prs.sid"                                                           => "audio-prs.sid.svg",
        "audio/vn.rn-realmedia"                                                   => "audio-vn.rn-realmedia.svg",
        "audio/vnd.rn-realvideo"                                                  => "audio-vnd.rn-realvideo.svg",
        "audio/x-adpcm"                                                           => "audio-x-adpcm.svg",
        "audio/x-aiff"                                                            => "audio-x-aiff.svg",
        "audio/x-flac+ogg"                                                        => "audio-x-flac+ogg.svg",
        "audio/x-flac"                                                            => "audio-x-flac.svg",
        "audio/x-generic"                                                         => "audio-x-generic.svg",
        "audio/x-monkey"                                                          => "audio-x-monkey.svg",
        "audio/x-mp2"                                                             => "audio-x-mp2.svg",
        "audio/x-mpeg"                                                            => "audio-x-mpeg.svg",
        "audio/x-speex+ogg"                                                       => "audio-x-speex+ogg.svg",
        "audio/x-wav"                                                             => "audio-x-wav.svg",
        "audiobook"                                                               => "audiobook.svg",
        "encrypted"                                                               => "encrypted.svg",
        "folder"                                                                  => "folder.svg",
        "font/ttf"                                                                => "font-ttf.svg",
        "fonts/package"                                                           => "fonts-package.svg",
        "image/bmp"                                                               => "image-bmp.svg",
        "image/gif"                                                               => "image-gif.svg",
        "image/ico"                                                               => "image-ico.svg",
        "image/jpeg"                                                              => "image-jpeg.svg",
        "image/jpeg2000"                                                          => "image-jpeg2000.svg",
        "image/png"                                                               => "image-png.svg",
        "image/svg+xml-compressed"                                                => "image-svg+xml-compressed.svg",
        "image/svg+xml"                                                           => "image-svg+xml.svg",
        "image/tiff"                                                              => "image-tiff.svg",
        "image/vnd.dgn"                                                           => "image-vnd.dgn.svg",
        "image/vnd.djvu"                                                          => "image-vnd.djvu.svg",
        "image/vnd.dwg"                                                           => "image-vnd.dwg.svg",
        "image/vnd.microsoft.icon"                                                => "image-vnd.microsoft.icon.svg",
        "image/x-adobe-dng"                                                       => "image-x-adobe-dng.svg",
        "image/x-compressed-xcf"                                                  => "image-x-compressed-xcf.svg",
        "image/x-emf"                                                             => "image-x-emf.svg",
        "image/x-eps"                                                             => "image-x-eps.svg",
        "image/x-generic"                                                         => "image-x-generic.svg",
        "image/x-ico"                                                             => "image-x-ico.svg",
        "image/x-icon"                                                            => "image-x-icon.svg",
        "image/x-krita"                                                           => "image-x-krita.svg",
        "image/x-portable-bitmap"                                                 => "image-x-portable-bitmap.svg",
        "image/x-psd"                                                             => "image-x-psd.svg",
        "image/x-psdimage-x-psd"                                                  => "image-x-psdimage-x-psd.svg",
        "image/x-svg+xml"                                                         => "image-x-svg+xml.svg",
        "image/x-tga"                                                             => "image-x-tga.svg",
        "image/x-vnd.trolltech.qpicture"                                          => "image-x-vnd.trolltech.qpicture.svg",
        "image/x-win-bitmap"                                                      => "image-x-win-bitmap.svg",
        "image/x-win-bmp"                                                         => "image-x-win-bmp.svg",
        "image/x-wmf"                                                             => "image-x-wmf.svg",
        "image/x-xcf"                                                             => "image-x-xcf.svg",
        "image/x-xfig"                                                            => "image-x-xfig.svg",
        "inode/directory"                                                         => "inode-directory.svg",
        "libreoffice/database"                                                    => "libreoffice-database.svg",
        "libreoffice/drawing-template"                                            => "libreoffice-drawing-template.svg",
        "libreoffice/drawing"                                                     => "libreoffice-drawing.svg",
        "libreoffice/extension"                                                   => "libreoffice-extension.svg",
        "libreoffice/formula"                                                     => "libreoffice-formula.svg",
        "libreoffice/master-document"                                             => "libreoffice-master-document.svg",
        "libreoffice/oasis-database"                                              => "libreoffice-oasis-database.svg",
        "libreoffice/oasis-drawing-template"                                      => "libreoffice-oasis-drawing-template.svg",
        "libreoffice/oasis-drawing"                                               => "libreoffice-oasis-drawing.svg",
        "libreoffice/oasis-formula"                                               => "libreoffice-oasis-formula.svg",
        "libreoffice/oasis-master-document"                                       => "libreoffice-oasis-master-document.svg",
        "libreoffice/oasis-presentation-template"                                 => "libreoffice-oasis-presentation-template.svg",
        "libreoffice/oasis-presentation"                                          => "libreoffice-oasis-presentation.svg",
        "libreoffice/oasis-spreadsheet-template"                                  => "libreoffice-oasis-spreadsheet-template.svg",
        "libreoffice/oasis-spreadsheet"                                           => "libreoffice-oasis-spreadsheet.svg",
        "libreoffice/oasis-text-template"                                         => "libreoffice-oasis-text-template.svg",
        "libreoffice/oasis-text"                                                  => "libreoffice-oasis-text.svg",
        "libreoffice/oasis-web-template"                                          => "libreoffice-oasis-web-template.svg",
        "libreoffice/presentation-template"                                       => "libreoffice-presentation-template.svg",
        "libreoffice/presentation"                                                => "libreoffice-presentation.svg",
        "libreoffice/spreadsheet-template"                                        => "libreoffice-spreadsheet-template.svg",
        "libreoffice/spreadsheet"                                                 => "libreoffice-spreadsheet.svg",
        "libreoffice/text-template"                                               => "libreoffice-text-template.svg",
        "libreoffice/text"                                                        => "libreoffice-text.svg",
        "message/news"                                                            => "message-news.svg",
        "message/partial"                                                         => "message-partial.svg",
        "message/rfc822"                                                          => "message-rfc822.svg",
        "message/x-gnu-rmail"                                                     => "message-x-gnu-rmail.svg",
        "message"                                                                 => "message.svg",
        "none"                                                                    => "none.svg",
        "odf"                                                                     => "odf.svg",
        "package/x-generic"                                                       => "package-x-generic.svg",
        "podcast"                                                                 => "podcast.svg",
        "text/calendar"                                                           => "text-calendar.svg",
        "text/csharp"                                                             => "text-csharp.svg",
        "text/css"                                                                => "text-css.svg",
        "text/csv"                                                                => "text-csv.svg",
        "text/directory"                                                          => "text-directory.svg",
        "text/dockerfile"                                                         => "text-dockerfile.svg",
        "text/enriched"                                                           => "text-enriched.svg",
        "text/html"                                                               => "text-html.svg",
        "text/markdown"                                                           => "text-markdown.svg",
        "text/mathml"                                                             => "text-mathml.svg",
        "text/plain"                                                              => "text-plain.svg",
        "text/rdf+xml"                                                            => "text-rdf+xml.svg",
        "text/rdf"                                                                => "text-rdf.svg",
        "text/rtf"                                                                => "text-rtf.svg",
        "text/rust"                                                               => "text-rust.svg",
        "text/sgml"                                                               => "text-sgml.svg",
        "text/troff"                                                              => "text-troff.svg",
        "text/vcalendar"                                                          => "text-vcalendar.svg",
        "text/vnd.abc"                                                            => "text-vnd.abc.svg",
        "text/vnd.trolltech.linguist"                                             => "text-vnd.trolltech.linguist.svg",
        "text/vnd.wap.wml"                                                        => "text-vnd.wap.wml.svg",
        "text/wiki"                                                               => "text-wiki.svg",
        "text/x-adasrc"                                                           => "text-x-adasrc.svg",
        "text/x-apport"                                                           => "text-x-apport.svg",
        "text/x-authors"                                                          => "text-x-authors.svg",
        "text/x-bibtex"                                                           => "text-x-bibtex.svg",
        "text/x-c++hdr"                                                           => "text-x-c++hdr.svg",
        "text/x-c++src"                                                           => "text-x-c++src.svg",
        "text/x-changelog"                                                        => "text-x-changelog.svg",
        "text/x-chdr"                                                             => "text-x-chdr.svg",
        "text/x-cmake"                                                            => "text-x-cmake.svg",
        "text/x-copying"                                                          => "text-x-copying.svg",
        "text/x-credits"                                                          => "text-x-credits.svg",
        "text/x-csharp"                                                           => "text-x-csharp.svg",
        "text/x-csrc"                                                             => "text-x-csrc.svg",
        "text/x-dtd"                                                              => "text-x-dtd.svg",
        "text/x-generic.svapplication-x-awk"                                      => "text-x-generic.svapplication-x-awk.svg",
        "text/x-generic"                                                          => "text-x-generic.svg",
        "text/x-gettext-translation"                                              => "text-x-gettext-translation.svg",
        "text/x-go"                                                               => "text-x-go.svg",
        "text/x-haskell"                                                          => "text-x-haskell.svg",
        "text/x-hex"                                                              => "text-x-hex.svg",
        "text/x-install"                                                          => "text-x-install.svg",
        "text/x-java-source"                                                      => "text-x-java-source.svg",
        "text/x-java"                                                             => "text-x-java.svg",
        "text/x-javascript"                                                       => "text-x-javascript.svg",
        "text/x-katefilelist"                                                     => "text-x-katefilelist.svg",
        "text/x-ldif"                                                             => "text-x-ldif.svg",
        "text/x-lilypond"                                                         => "text-x-lilypond.svg",
        "text/x-log"                                                              => "text-x-log.svg",
        "text/x-lua"                                                              => "text-x-lua.svg",
        "text/x-makefile"                                                         => "text-x-makefile.svg",
        "text/x-markdown"                                                         => "text-x-markdown.svg",
        "text/x-nfo"                                                              => "text-x-nfo.svg",
        "text/x-objchdr"                                                          => "text-x-objchdr.svg",
        "text/x-objcsrc"                                                          => "text-x-objcsrc.svg",
        "text/x-opml+xml"                                                         => "text-x-opml+xml.svg",
        "text/x-opml"                                                             => "text-x-opml.svg",
        "text/x-pascal"                                                           => "text-x-pascal.svg",
        "text/x-patch"                                                            => "text-x-patch.svg",
        "text/x-plain"                                                            => "text-x-plain.svg",
        "text/x-po"                                                               => "text-x-po.svg",
        "text/x-python"                                                           => "text-x-python.svg",
        "text/x-qml"                                                              => "text-x-qml.svg",
        "text/x-r"                                                                => "text-x-r.svg",
        "text/x-readme"                                                           => "text-x-readme.svg",
        "text/x-rpm-spec"                                                         => "text-x-rpm-spec.svg",
        "text/x-rust"                                                             => "text-x-rust.svg",
        "text/x-sass"                                                             => "text-x-sass.svg",
        "text/x-scala"                                                            => "text-x-scala.svg",
        "text/x-script"                                                           => "text-x-script.svg",
        "text/x-scss"                                                             => "text-x-scss.svg",
        "text/x-sql"                                                              => "text-x-sql.svg",
        "text/x-tcl"                                                              => "text-x-tcl.svg",
        "text/x-tex"                                                              => "text-x-tex.svg",
        "text/x-texinfo"                                                          => "text-x-texinfo.svg",
        "text/x-vcard"                                                            => "text-x-vcard.svg",
        "text/x-xslfo"                                                            => "text-x-xslfo.svg",
        "text/xmcd"                                                               => "text-xmcd.svg",
        "text/xml"                                                                => "text-xml.svg",
        "unknown"                                                                 => "unknown.svg",
        "uri/mms"                                                                 => "uri-mms.svg",
        "uri/mmst"                                                                => "uri-mmst.svg",
        "uri/pnm"                                                                 => "uri-pnm.svg",
        "uri/rtspt"                                                               => "uri-rtspt.svg",
        "uri/rtspu"                                                               => "uri-rtspu.svg",
        "video/mlt-playlist"                                                      => "video-mlt-playlist.svg",
        "video/mp2t"                                                              => "video-mp2t.svg",
        "video/mp4"                                                               => "video-mp4.svg",
        "video/vivo"                                                              => "video-vivo.svg",
        "video/vnd.rn-realvideo"                                                  => "video-vnd.rn-realvideo.svg",
        "video/wavelet"                                                           => "video-wavelet.svg",
        "video/webm"                                                              => "video-webm.svg",
        "video/x-anim"                                                            => "video-x-anim.svg",
        "video/x-flic"                                                            => "video-x-flic.svg",
        "video/x-flv"                                                             => "video-x-flv.svg",
        "video/x-generic"                                                         => "video-x-generic.svg",
        "video/x-google-vlc-plugin"                                               => "video-x-google-vlc-plugin.svg",
        "video/x-javafx"                                                          => "video-x-javafx.svg",
        "video/x-matroska"                                                        => "video-x-matroska.svg",
        "video/x-mng"                                                             => "video-x-mng.svg",
        "video/x-ms-wmp"                                                          => "video-x-ms-wmp.svg",
        "video/x-ms-wmv"                                                          => "video-x-ms-wmv.svg",
        "video/x-msvideo"                                                         => "video-x-msvideo.svg",
        "video/x-ogm+ogg"                                                         => "video-x-ogm+ogg.svg",
        "video/x-theora+ogg"                                                      => "video-x-theora+ogg.svg",
        "video/x-wmv"                                                             => "video-x-wmv.svg",
        "viewbib"                                                                 => "viewbib.svg",
        "viewdvi"                                                                 => "viewdvi.svg",
        "viewhtml"                                                                => "viewhtml.svg",
        "viewpdf"                                                                 => "viewpdf.svg",
        "viewps"                                                                  => "viewps.svg",
        "virtualbox/hdd"                                                          => "virtualbox-hdd.svg",
        "virtualbox/ova"                                                          => "virtualbox-ova.svg",
        "virtualbox/ovf"                                                          => "virtualbox-ovf.svg",
        "virtualbox/vbox-extpack"                                                 => "virtualbox-vbox-extpack.svg",
        "virtualbox/vbox"                                                         => "virtualbox-vbox.svg",
        "virtualbox/vdi"                                                          => "virtualbox-vdi.svg",
        "virtualbox/vhd"                                                          => "virtualbox-vhd.svg",
        "virtualbox/vmdk"                                                         => "virtualbox-vmdk.svg",
        "vnd.ms-publisher"                                                        => "vnd.ms-publisher.svg",
        "x-kde-nsplugin-generated"                                                => "x-kde-nsplugin-generated.svg",
        "x-mail-distribution-list"                                                => "x-mail-distribution-list.svg",
        "x-media-podcast"                                                         => "x-media-podcast.svg",
        "x-office-address-book"                                                   => "x-office-address-book.svg",
        "x-office/calendar"                                                       => "x-office-calendar.svg",
        "x-office/contact"                                                        => "x-office-contact.svg",
        "x-office/document"                                                       => "x-office-document.svg",
        "x-office/drawing"                                                        => "x-office-drawing.svg",
        "x-office/presentation"                                                   => "x-office-presentation.svg",
        "x-office/spreadsheet"                                                    => "x-office-spreadsheet.svg",
    ];

    /**
     * Test getImage()
     *
     * @return void
     */
    public function testGetImage(): void {

        $obj = new MimeTypeImageProvider();

        foreach (self::IMAGES as $k => $v) {
            $this->assertEquals($v, $obj->getImage($k), $k);
        }

        $this->assertEquals(MimeTypeImageProvider::DEFAULT_IMAGE, $obj->getImage("exception"));
    }

    /**
     * Test getImageUri()
     *
     * @return void
     */
    public function testGetImageUri(): void {

        $uri = realpath(__DIR__ . "/../../../Resources/public/" . MimeTypeImageProvider::IMAGES_FOLDER);

        $obj = new MimeTypeImageProvider();

        foreach (self::IMAGES as $k => $v) {
            $this->assertEquals($uri . DIRECTORY_SEPARATOR . $v, $obj->getImageUri($k), $k);
        }
    }

    /**
     * Test getImageUrl()
     *
     * @return void
     */
    public function testGetImageUrl(): void {

        $uri = "/bundles/wbwcommon/" . MimeTypeImageProvider::IMAGES_FOLDER;

        $obj = new MimeTypeImageProvider();

        foreach (self::IMAGES as $k => $v) {
            $this->assertEquals("$uri/$v", $obj->getImageUrl($k), $k);
        }
    }

    /**
     * Test getImages()
     *
     * @return void
     */
    public function testGetImages(): void {

        $exp = array_values(self::IMAGES);

        $obj = new MimeTypeImageProvider();

        $this->assertCount(460, $obj->getImages());
        $this->assertEquals($exp, $obj->getImages());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $directory = realpath(__DIR__ . "/../../../Resources/public/" . MimeTypeImageProvider::IMAGES_FOLDER);

        $this->assertEquals("unknown.svg", MimeTypeImageProvider::DEFAULT_IMAGE);
        $this->assertEquals("img/mimetype/default", MimeTypeImageProvider::IMAGES_FOLDER);
        $this->assertEquals("wbw.common.provider.image.mime_type", MimeTypeImageProvider::SERVICE_NAME);

        $obj = new MimeTypeImageProvider();

        $this->assertInstanceOf(ImageProviderInterface::class, $obj);
        $this->assertInstanceOf(MimeTypeImageProvider::class, $obj);

        $this->assertEquals($directory, $obj->getDirectory());
    }
}
