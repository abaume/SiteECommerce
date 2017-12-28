USE [Classique]

/****** Object:  Table [dbo].[Type_Morceaux]    Script Date: 09/03/2014 18:18:43 ******/
SET ANSI_NULLS ON

SET QUOTED_IDENTIFIER ON

CREATE TABLE [dbo].[Type_Morceaux](
	[Code_Type] [int] IDENTITY(1,1) NOT NULL,
	[Libellé_Type] [nchar](20) NOT NULL,
	[Description] [nvarchar](max) NULL,
 CONSTRAINT [PK_TYpe_Morceaux] PRIMARY KEY CLUSTERED 
(
	[Code_Type] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]

/****** Object:  Table [dbo].[Pays]    Script Date: 09/03/2014 18:18:43 ******/
SET ANSI_NULLS ON

SET QUOTED_IDENTIFIER ON

CREATE TABLE [dbo].[Pays](
	[Code_Pays] [int] IDENTITY(1,1) NOT NULL,
	[Nom_Pays] [nvarchar](50) NULL,
 CONSTRAINT [PK_Pays] PRIMARY KEY CLUSTERED 
(
	[Code_Pays] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]

/****** Object:  Table [dbo].[Orchestres]    Script Date: 09/03/2014 18:18:43 ******/
SET ANSI_NULLS ON

SET QUOTED_IDENTIFIER ON

CREATE TABLE [dbo].[Orchestres](
	[Code_Orchestre] [int] IDENTITY(1,1) NOT NULL,
	[Nom_Orchestre] [nvarchar](150) NOT NULL,
 CONSTRAINT [PK_Orchestres] PRIMARY KEY CLUSTERED 
(
	[Code_Orchestre] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]

/****** Object:  Table [dbo].[Catalogue]    Script Date: 09/03/2014 18:18:43 ******/
SET ANSI_NULLS ON

SET QUOTED_IDENTIFIER ON

CREATE TABLE [dbo].[Catalogue](
	[Code_Catalogue] [int] IDENTITY(1,1) NOT NULL,
	[Nom_Catalogue] [nchar](10) NULL,
	[Musicien] [nchar](20) NULL,
	[Sens] [nvarchar](50) NULL,
 CONSTRAINT [PK_Catalogue] PRIMARY KEY CLUSTERED 
(
	[Code_Catalogue] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]

/****** Object:  Table [dbo].[Composition]    Script Date: 09/03/2014 18:18:43 ******/
SET ANSI_NULLS ON

SET QUOTED_IDENTIFIER ON

CREATE TABLE [dbo].[Composition](
	[Code_Composition] [int] IDENTITY(1,1) NOT NULL,
	[Titre_Composition] [nvarchar](max) NOT NULL,
	[Année] [int] NULL,
	[Composante_Composition] [nvarchar](max) NULL,
 CONSTRAINT [PK_Composition] PRIMARY KEY CLUSTERED 
(
	[Code_Composition] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]

/****** Object:  Table [dbo].[Instrument]    Script Date: 09/03/2014 18:18:43 ******/
SET ANSI_NULLS ON

SET QUOTED_IDENTIFIER ON

SET ANSI_PADDING ON

CREATE TABLE [dbo].[Instrument](
	[Code_Instrument] [int] IDENTITY(1,1) NOT NULL,
	[Nom_Instrument] [nvarchar](50) NOT NULL,
	[Image] [varbinary](max) NULL,
 CONSTRAINT [PK_Instrument] PRIMARY KEY CLUSTERED 
(
	[Code_Instrument] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]

SET ANSI_PADDING OFF

/****** Object:  Table [dbo].[Genre]    Script Date: 09/03/2014 18:18:43 ******/
SET ANSI_NULLS ON

SET QUOTED_IDENTIFIER ON

CREATE TABLE [dbo].[Genre](
	[Code_Genre] [int] NOT NULL,
	[Libellé_Abrégé] [nchar](30) NOT NULL,
 CONSTRAINT [PK_Genre] PRIMARY KEY CLUSTERED 
(
	[Code_Genre] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]

/****** Object:  Table [dbo].[Extraits]    Script Date: 09/03/2014 18:18:43 ******/
SET ANSI_NULLS ON

SET QUOTED_IDENTIFIER ON

SET ANSI_PADDING ON

CREATE TABLE [dbo].[Extraits](
	[Code_Enregistrement] [int] IDENTITY(1,1) NOT NULL,
	[Extrait] [varbinary](max) NULL,
 CONSTRAINT [PK_Extraits] PRIMARY KEY CLUSTERED 
(
	[Code_Enregistrement] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]

SET ANSI_PADDING OFF

/****** Object:  Table [dbo].[Enregistrement]    Script Date: 09/03/2014 18:18:43 ******/
SET ANSI_NULLS ON

SET QUOTED_IDENTIFIER ON

SET ANSI_PADDING ON

CREATE TABLE [dbo].[Enregistrement](
	[Code_Enregistrement] [int] IDENTITY(1,1) NOT NULL,
	[Titre] [nvarchar](max) NOT NULL,
	[Code_Composition] [int] NOT NULL,
	[Nom_de_Fichier] [nvarchar](max) NOT NULL,
	[Durée] [nchar](10) NULL,
	[Durée_Seconde] [int] NULL,
	[Prix] [money] NULL,
	[Extrait] [varbinary](max) NULL,
 CONSTRAINT [PK_mp3File] PRIMARY KEY CLUSTERED 
(
	[Code_Enregistrement] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]

SET ANSI_PADDING OFF

/****** Object:  Table [dbo].[Editeur]    Script Date: 09/03/2014 18:18:43 ******/
SET ANSI_NULLS ON

SET QUOTED_IDENTIFIER ON

CREATE TABLE [dbo].[Editeur](
	[Code_Editeur] [int] IDENTITY(1,1) NOT NULL,
	[Nom_Editeur] [nvarchar](50) NOT NULL,
	[Code_Pays] [int] NULL,
 CONSTRAINT [PK_Editeur] PRIMARY KEY CLUSTERED 
(
	[Code_Editeur] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]

/****** Object:  Table [dbo].[Abonné]    Script Date: 09/03/2014 18:18:43 ******/
SET ANSI_NULLS ON

SET QUOTED_IDENTIFIER ON

CREATE TABLE [dbo].[Abonné](
	[Code_Abonné] [int] IDENTITY(1,1) NOT NULL,
	[Nom_Abonné] [nchar](50) NOT NULL,
	[Prénom_Abonné] [nchar](20) NULL,
	[Login] [nchar](10) NULL,
	[Password] [nchar](10) NULL,
	[Code_Pays] [int] NULL,
 CONSTRAINT [PK_Abonné] PRIMARY KEY CLUSTERED 
(
	[Code_Abonné] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]

/****** Object:  Table [dbo].[Oeuvre]    Script Date: 09/03/2014 18:18:43 ******/
SET ANSI_NULLS ON

SET QUOTED_IDENTIFIER ON

CREATE TABLE [dbo].[Oeuvre](
	[Code_Oeuvre] [int] IDENTITY(1,1) NOT NULL,
	[Titre_Oeuvre] [nvarchar](max) NOT NULL,
	[Sous_Titre] [nvarchar](max) NULL,
	[Tonalité] [nchar](20) NULL,
	[Code_Type] [int] NULL,
	[Année] [int] NULL,
	[Opus] [nchar](20) NULL,
	[Numéro_Opus] [int] NULL,
 CONSTRAINT [PK_Oeuvre] PRIMARY KEY CLUSTERED 
(
	[Code_Oeuvre] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]

/****** Object:  Table [dbo].[Musicien]    Script Date: 09/03/2014 18:18:43 ******/
SET ANSI_NULLS ON

SET QUOTED_IDENTIFIER ON

SET ANSI_PADDING ON

CREATE TABLE [dbo].[Musicien](
	[Code_Musicien] [int] IDENTITY(1,1) NOT NULL,
	[Nom_Musicien] [nvarchar](200) NOT NULL,
	[Prénom_Musicien] [nvarchar](50) NULL,
	[Année_Naissance] [int] NULL,
	[Année_Mort] [int] NULL,
	[Code_Pays] [int] NULL,
	[Photo] [varbinary](max) NULL,
 CONSTRAINT [PK_Musicien] PRIMARY KEY CLUSTERED 
(
	[Code_Musicien] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]

SET ANSI_PADDING OFF

/****** Object:  Table [dbo].[Interpréter]    Script Date: 09/03/2014 18:18:43 ******/
SET ANSI_NULLS ON

SET QUOTED_IDENTIFIER ON

CREATE TABLE [dbo].[Interpréter](
	[Code_Interpréter] [int] IDENTITY(1,1) NOT NULL,
	[Code_Enregistrement] [int] NULL,
	[Code_Musicien] [int] NULL,
	[Code_Instrument] [int] NULL,
 CONSTRAINT [PK_Interpréter] PRIMARY KEY CLUSTERED 
(
	[Code_Interpréter] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]

/****** Object:  Table [dbo].[Instrumentation]    Script Date: 09/03/2014 18:18:43 ******/
SET ANSI_NULLS ON

SET QUOTED_IDENTIFIER ON

CREATE TABLE [dbo].[Instrumentation](
	[Code_Instrumentation] [int] IDENTITY(1,1) NOT NULL,
	[Code_Oeuvre] [int] NULL,
	[Code_Instrument] [int] NULL,
 CONSTRAINT [PK_Instrumentation] PRIMARY KEY CLUSTERED 
(
	[Code_Instrumentation] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]

/****** Object:  Table [dbo].[Composer]    Script Date: 09/03/2014 18:18:43 ******/
SET ANSI_NULLS ON

SET QUOTED_IDENTIFIER ON

CREATE TABLE [dbo].[Composer](
	[Code_Composer] [int] IDENTITY(1,1) NOT NULL,
	[Code_Musicien] [int] NULL,
	[Code_Oeuvre] [int] NULL,
	[Code] [int] NULL,
 CONSTRAINT [PK_Composer] PRIMARY KEY CLUSTERED 
(
	[Code_Composer] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]

/****** Object:  Table [dbo].[Album]    Script Date: 09/03/2014 18:18:43 ******/
SET ANSI_NULLS ON

SET QUOTED_IDENTIFIER ON

SET ANSI_PADDING ON

CREATE TABLE [dbo].[Album](
	[Code_Album] [int] IDENTITY(1,1) NOT NULL,
	[Titre_Album] [nvarchar](400) NOT NULL,
	[Année_Album] [int] NULL,
	[Code_Genre] [int] NULL,
	[Code_Editeur] [int] NULL,
	[Pochette] [varbinary](max) NULL,
 CONSTRAINT [PK_Album] PRIMARY KEY CLUSTERED 
(
	[Code_Album] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]

SET ANSI_PADDING OFF

/****** Object:  Table [dbo].[Acheter]    Script Date: 09/03/2014 18:18:43 ******/
SET ANSI_NULLS ON

SET QUOTED_IDENTIFIER ON

CREATE TABLE [dbo].[Acheter](
	[Code_Achat] [int] IDENTITY(1,1) NOT NULL,
	[Code_Enregistrement] [int] NOT NULL,
	[Code_Abonné] [int] NOT NULL,
 CONSTRAINT [PK_Achat] PRIMARY KEY CLUSTERED 
(
	[Code_Achat] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]

/****** Object:  Table [dbo].[Direction]    Script Date: 09/03/2014 18:18:43 ******/
SET ANSI_NULLS ON

SET QUOTED_IDENTIFIER ON

CREATE TABLE [dbo].[Direction](
	[Code_Direction] [int] IDENTITY(1,1) NOT NULL,
	[Code_Musicien] [int] NULL,
	[Code_Enregistrement] [int] NULL,
	[Code_Orchestre] [int] NULL,
 CONSTRAINT [PK_Direction] PRIMARY KEY CLUSTERED 
(
	[Code_Direction] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]

/****** Object:  Table [dbo].[Composition_Oeuvre]    Script Date: 09/03/2014 18:18:43 ******/
SET ANSI_NULLS ON

SET QUOTED_IDENTIFIER ON

CREATE TABLE [dbo].[Composition_Oeuvre](
	[Code_Composer_Oeuvre] [int] IDENTITY(1,1) NOT NULL,
	[Code_Oeuvre] [int] NULL,
	[Code_Composition] [int] NULL,
 CONSTRAINT [PK_Composition_Oeuvre] PRIMARY KEY CLUSTERED 
(
	[Code_Composer_Oeuvre] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]

/****** Object:  Table [dbo].[Emprunter]    Script Date: 09/03/2014 18:18:43 ******/
SET ANSI_NULLS ON

SET QUOTED_IDENTIFIER ON

CREATE TABLE [dbo].[Emprunter](
	[Code_Emprunt] [int] IDENTITY(1,1) NOT NULL,
	[Code_Abonné] [int] NOT NULL,
	[Code_Album] [int] NOT NULL,
	[Date_Emprunt] [date] NOT NULL,
 CONSTRAINT [PK_Emprunter] PRIMARY KEY CLUSTERED 
(
	[Code_Emprunt] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]

/****** Object:  Table [dbo].[Disque]    Script Date: 09/03/2014 18:18:43 ******/
SET ANSI_NULLS ON

SET QUOTED_IDENTIFIER ON

CREATE TABLE [dbo].[Disque](
	[Code_Disque] [int] IDENTITY(1,1) NOT NULL,
	[Code_Album] [int] NOT NULL,
	[Référence_Album] [nvarchar](200) NOT NULL,
	[Référence_Disque] [nchar](10) NULL,
 CONSTRAINT [PK_Disque] PRIMARY KEY CLUSTERED 
(
	[Code_Disque] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]

/****** Object:  Table [dbo].[Composition_Disque]    Script Date: 09/03/2014 18:18:43 ******/
SET ANSI_NULLS ON

SET QUOTED_IDENTIFIER ON

CREATE TABLE [dbo].[Composition_Disque](
	[Code_Contenir] [int] IDENTITY(1,1) NOT NULL,
	[Code_Disque] [int] NULL,
	[Code_Enregistrement] [int] NULL,
	[Position] [int] NULL,
 CONSTRAINT [PK_Contenir_Morceaux] PRIMARY KEY CLUSTERED 
(
	[Code_Contenir] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]

/****** Object:  Default [DF_Oeuvre_Numéro_Opus]    Script Date: 09/03/2014 18:18:43 ******/
ALTER TABLE [dbo].[Oeuvre] ADD  CONSTRAINT [DF_Oeuvre_Numéro_Opus]  DEFAULT ((0)) FOR [Numéro_Opus]

/****** Object:  ForeignKey [FK_Abonné_Pays]    Script Date: 09/03/2014 18:18:43 ******/
ALTER TABLE [dbo].[Abonné]  WITH CHECK ADD  CONSTRAINT [FK_Abonné_Pays] FOREIGN KEY([Code_Pays])
REFERENCES [dbo].[Pays] ([Code_Pays])

ALTER TABLE [dbo].[Abonné] CHECK CONSTRAINT [FK_Abonné_Pays]

/****** Object:  ForeignKey [FK_Achat_Abonné]    Script Date: 09/03/2014 18:18:43 ******/
ALTER TABLE [dbo].[Acheter]  WITH CHECK ADD  CONSTRAINT [FK_Achat_Abonné] FOREIGN KEY([Code_Abonné])
REFERENCES [dbo].[Abonné] ([Code_Abonné])

ALTER TABLE [dbo].[Acheter] CHECK CONSTRAINT [FK_Achat_Abonné]

/****** Object:  ForeignKey [FK_Achat_Enregistrement]    Script Date: 09/03/2014 18:18:43 ******/
ALTER TABLE [dbo].[Acheter]  WITH CHECK ADD  CONSTRAINT [FK_Achat_Enregistrement] FOREIGN KEY([Code_Achat])
REFERENCES [dbo].[Enregistrement] ([Code_Enregistrement])

ALTER TABLE [dbo].[Acheter] CHECK CONSTRAINT [FK_Achat_Enregistrement]

/****** Object:  ForeignKey [FK_Album_Editeur]    Script Date: 09/03/2014 18:18:43 ******/
ALTER TABLE [dbo].[Album]  WITH CHECK ADD  CONSTRAINT [FK_Album_Editeur] FOREIGN KEY([Code_Editeur])
REFERENCES [dbo].[Editeur] ([Code_Editeur])

ALTER TABLE [dbo].[Album] CHECK CONSTRAINT [FK_Album_Editeur]

/****** Object:  ForeignKey [FK_Album_Genre]    Script Date: 09/03/2014 18:18:43 ******/
ALTER TABLE [dbo].[Album]  WITH CHECK ADD  CONSTRAINT [FK_Album_Genre] FOREIGN KEY([Code_Genre])
REFERENCES [dbo].[Genre] ([Code_Genre])

ALTER TABLE [dbo].[Album] CHECK CONSTRAINT [FK_Album_Genre]

/****** Object:  ForeignKey [FK_Composer_Musicien]    Script Date: 09/03/2014 18:18:43 ******/
ALTER TABLE [dbo].[Composer]  WITH CHECK ADD  CONSTRAINT [FK_Composer_Musicien] FOREIGN KEY([Code_Musicien])
REFERENCES [dbo].[Musicien] ([Code_Musicien])

ALTER TABLE [dbo].[Composer] CHECK CONSTRAINT [FK_Composer_Musicien]

/****** Object:  ForeignKey [FK_Composer_Oeuvre]    Script Date: 09/03/2014 18:18:43 ******/
ALTER TABLE [dbo].[Composer]  WITH CHECK ADD  CONSTRAINT [FK_Composer_Oeuvre] FOREIGN KEY([Code_Oeuvre])
REFERENCES [dbo].[Oeuvre] ([Code_Oeuvre])

ALTER TABLE [dbo].[Composer] CHECK CONSTRAINT [FK_Composer_Oeuvre]

/****** Object:  ForeignKey [FK_Contenir_Morceaux_Disque]    Script Date: 09/03/2014 18:18:43 ******/
ALTER TABLE [dbo].[Composition_Disque]  WITH CHECK ADD  CONSTRAINT [FK_Contenir_Morceaux_Disque] FOREIGN KEY([Code_Disque])
REFERENCES [dbo].[Disque] ([Code_Disque])

ALTER TABLE [dbo].[Composition_Disque] CHECK CONSTRAINT [FK_Contenir_Morceaux_Disque]

/****** Object:  ForeignKey [FK_Contenir_Morceaux_Morceaux]    Script Date: 09/03/2014 18:18:43 ******/
ALTER TABLE [dbo].[Composition_Disque]  WITH CHECK ADD  CONSTRAINT [FK_Contenir_Morceaux_Morceaux] FOREIGN KEY([Code_Enregistrement])
REFERENCES [dbo].[Enregistrement] ([Code_Enregistrement])

ALTER TABLE [dbo].[Composition_Disque] CHECK CONSTRAINT [FK_Contenir_Morceaux_Morceaux]

/****** Object:  ForeignKey [FK_Composition_Oeuvre_Composition]    Script Date: 09/03/2014 18:18:43 ******/
ALTER TABLE [dbo].[Composition_Oeuvre]  WITH CHECK ADD  CONSTRAINT [FK_Composition_Oeuvre_Composition] FOREIGN KEY([Code_Composition])
REFERENCES [dbo].[Composition] ([Code_Composition])

ALTER TABLE [dbo].[Composition_Oeuvre] CHECK CONSTRAINT [FK_Composition_Oeuvre_Composition]

/****** Object:  ForeignKey [FK_Composition_Oeuvre_Oeuvre]    Script Date: 09/03/2014 18:18:43 ******/
ALTER TABLE [dbo].[Composition_Oeuvre]  WITH CHECK ADD  CONSTRAINT [FK_Composition_Oeuvre_Oeuvre] FOREIGN KEY([Code_Oeuvre])
REFERENCES [dbo].[Oeuvre] ([Code_Oeuvre])

ALTER TABLE [dbo].[Composition_Oeuvre] CHECK CONSTRAINT [FK_Composition_Oeuvre_Oeuvre]

/****** Object:  ForeignKey [FK_Direction_Morceaux]    Script Date: 09/03/2014 18:18:43 ******/
ALTER TABLE [dbo].[Direction]  WITH CHECK ADD  CONSTRAINT [FK_Direction_Morceaux] FOREIGN KEY([Code_Enregistrement])
REFERENCES [dbo].[Enregistrement] ([Code_Enregistrement])

ALTER TABLE [dbo].[Direction] CHECK CONSTRAINT [FK_Direction_Morceaux]

/****** Object:  ForeignKey [FK_Direction_Musicien]    Script Date: 09/03/2014 18:18:43 ******/
ALTER TABLE [dbo].[Direction]  WITH CHECK ADD  CONSTRAINT [FK_Direction_Musicien] FOREIGN KEY([Code_Musicien])
REFERENCES [dbo].[Musicien] ([Code_Musicien])

ALTER TABLE [dbo].[Direction] CHECK CONSTRAINT [FK_Direction_Musicien]

/****** Object:  ForeignKey [FK_Direction_Orchestres]    Script Date: 09/03/2014 18:18:43 ******/
ALTER TABLE [dbo].[Direction]  WITH CHECK ADD  CONSTRAINT [FK_Direction_Orchestres] FOREIGN KEY([Code_Orchestre])
REFERENCES [dbo].[Orchestres] ([Code_Orchestre])

ALTER TABLE [dbo].[Direction] CHECK CONSTRAINT [FK_Direction_Orchestres]

/****** Object:  ForeignKey [FK_Disque_Album]    Script Date: 09/03/2014 18:18:43 ******/
ALTER TABLE [dbo].[Disque]  WITH CHECK ADD  CONSTRAINT [FK_Disque_Album] FOREIGN KEY([Code_Album])
REFERENCES [dbo].[Album] ([Code_Album])

ALTER TABLE [dbo].[Disque] CHECK CONSTRAINT [FK_Disque_Album]

/****** Object:  ForeignKey [FK_Editeur_Pays]    Script Date: 09/03/2014 18:18:43 ******/
ALTER TABLE [dbo].[Editeur]  WITH CHECK ADD  CONSTRAINT [FK_Editeur_Pays] FOREIGN KEY([Code_Pays])
REFERENCES [dbo].[Pays] ([Code_Pays])

ALTER TABLE [dbo].[Editeur] CHECK CONSTRAINT [FK_Editeur_Pays]

/****** Object:  ForeignKey [FK_Emprunter_Abonné]    Script Date: 09/03/2014 18:18:43 ******/
ALTER TABLE [dbo].[Emprunter]  WITH CHECK ADD  CONSTRAINT [FK_Emprunter_Abonné] FOREIGN KEY([Code_Abonné])
REFERENCES [dbo].[Abonné] ([Code_Abonné])

ALTER TABLE [dbo].[Emprunter] CHECK CONSTRAINT [FK_Emprunter_Abonné]

/****** Object:  ForeignKey [FK_Emprunter_Album]    Script Date: 09/03/2014 18:18:43 ******/
ALTER TABLE [dbo].[Emprunter]  WITH CHECK ADD  CONSTRAINT [FK_Emprunter_Album] FOREIGN KEY([Code_Album])
REFERENCES [dbo].[Album] ([Code_Album])

ALTER TABLE [dbo].[Emprunter] CHECK CONSTRAINT [FK_Emprunter_Album]

/****** Object:  ForeignKey [FK_Enregistrement_Composition]    Script Date: 09/03/2014 18:18:43 ******/
ALTER TABLE [dbo].[Enregistrement]  WITH CHECK ADD  CONSTRAINT [FK_Enregistrement_Composition] FOREIGN KEY([Code_Composition])
REFERENCES [dbo].[Composition] ([Code_Composition])

ALTER TABLE [dbo].[Enregistrement] CHECK CONSTRAINT [FK_Enregistrement_Composition]

/****** Object:  ForeignKey [FK_Instrumentation_Instrument]    Script Date: 09/03/2014 18:18:43 ******/
ALTER TABLE [dbo].[Instrumentation]  WITH CHECK ADD  CONSTRAINT [FK_Instrumentation_Instrument] FOREIGN KEY([Code_Instrument])
REFERENCES [dbo].[Instrument] ([Code_Instrument])

ALTER TABLE [dbo].[Instrumentation] CHECK CONSTRAINT [FK_Instrumentation_Instrument]

/****** Object:  ForeignKey [FK_Instrumentation_Oeuvre]    Script Date: 09/03/2014 18:18:43 ******/
ALTER TABLE [dbo].[Instrumentation]  WITH CHECK ADD  CONSTRAINT [FK_Instrumentation_Oeuvre] FOREIGN KEY([Code_Oeuvre])
REFERENCES [dbo].[Oeuvre] ([Code_Oeuvre])

ALTER TABLE [dbo].[Instrumentation] CHECK CONSTRAINT [FK_Instrumentation_Oeuvre]

/****** Object:  ForeignKey [FK_Interpréter_Instrument]    Script Date: 09/03/2014 18:18:43 ******/
ALTER TABLE [dbo].[Interpréter]  WITH CHECK ADD  CONSTRAINT [FK_Interpréter_Instrument] FOREIGN KEY([Code_Instrument])
REFERENCES [dbo].[Instrument] ([Code_Instrument])

ALTER TABLE [dbo].[Interpréter] CHECK CONSTRAINT [FK_Interpréter_Instrument]

/****** Object:  ForeignKey [FK_Interpréter_Morceaux]    Script Date: 09/03/2014 18:18:43 ******/
ALTER TABLE [dbo].[Interpréter]  WITH CHECK ADD  CONSTRAINT [FK_Interpréter_Morceaux] FOREIGN KEY([Code_Enregistrement])
REFERENCES [dbo].[Enregistrement] ([Code_Enregistrement])

ALTER TABLE [dbo].[Interpréter] CHECK CONSTRAINT [FK_Interpréter_Morceaux]

/****** Object:  ForeignKey [FK_Interpréter_Musicien]    Script Date: 09/03/2014 18:18:43 ******/
ALTER TABLE [dbo].[Interpréter]  WITH CHECK ADD  CONSTRAINT [FK_Interpréter_Musicien] FOREIGN KEY([Code_Musicien])
REFERENCES [dbo].[Musicien] ([Code_Musicien])

ALTER TABLE [dbo].[Interpréter] CHECK CONSTRAINT [FK_Interpréter_Musicien]

/****** Object:  ForeignKey [FK_Musicien_Musicien]    Script Date: 09/03/2014 18:18:43 ******/
ALTER TABLE [dbo].[Musicien]  WITH CHECK ADD  CONSTRAINT [FK_Musicien_Musicien] FOREIGN KEY([Code_Pays])
REFERENCES [dbo].[Pays] ([Code_Pays])

ALTER TABLE [dbo].[Musicien] CHECK CONSTRAINT [FK_Musicien_Musicien]

/****** Object:  ForeignKey [FK_Oeuvre_Type_Morceaux]    Script Date: 09/03/2014 18:18:43 ******/
ALTER TABLE [dbo].[Oeuvre]  WITH CHECK ADD  CONSTRAINT [FK_Oeuvre_Type_Morceaux] FOREIGN KEY([Code_Type])
REFERENCES [dbo].[Type_Morceaux] ([Code_Type])

ALTER TABLE [dbo].[Oeuvre] CHECK CONSTRAINT [FK_Oeuvre_Type_Morceaux]

