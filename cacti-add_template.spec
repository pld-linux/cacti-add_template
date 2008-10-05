Summary:	Adding template for Cacti from command line
Summary(pl.UTF-8):	Dodawanie szablonów dla Cacti z linii poleceń
Name:		cacti-add_template
Version:	0.1
Release:	1
License:	GPL v2
Group:		Applications/WWW
Source0:	http://forums.cacti.net/files/add_template.zip
# Source0-md5:	a38f01091cb4bf1dbd86db29d6c4c966
Patch0:		cacti-addons-add_template.patch
URL:		http://forums.cacti.net/about8827.html
BuildRequires:	rpm-perlprov
BuildRequires:	rpmbuild(macros) >= 1.322
BuildRequires:	unzip
Requires:	cacti
Obsoletes:	cacti-addons-cmd_line_add_template
BuildArch:	noarch
BuildRoot:	%{tmpdir}/%{name}-%{version}-root-%(id -u -n)

%description
Adding template for Cacti from command line.

Usage: cacti-add_template your_template.xml

%description
Dodawanie szablonu dla Cacti z linii poleceń.

Wywołanie: cacti-add_template your_template.xml

%prep
%setup -q -c
%{__sed} -i -e 's,\r$,,' cacti/*.php
%patch0 -p1

%install
rm -rf $RPM_BUILD_ROOT
install -d $RPM_BUILD_ROOT%{_sbindir}
install cacti/add_template.php $RPM_BUILD_ROOT%{_sbindir}/%{name}

%clean
rm -rf $RPM_BUILD_ROOT

%files
%defattr(644,root,root,755)
%attr(755,root,root) %{_sbindir}/cacti-add_template
